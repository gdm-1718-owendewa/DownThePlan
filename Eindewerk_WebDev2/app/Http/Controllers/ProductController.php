<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Fundings;
use App\Models\Image;
use App\Models\Article;
use App\Models\Spotlight;
use App\Models\Comment;
use App\Mail\FundMail;


use PDF;
use Carbon\Carbon;


class ProductController extends Controller
{
    //
    public function getProducts(){
        if (Auth::user()){
            $products = Product::all()->sortBy('category_id')->where('deadline','>', Carbon::now());  
            $categories = Category::all();
            $currentUserId = Auth::user()->id;
            $now = Carbon::now();
            return view('products/products')->with(compact('products','categories', 'currentUserId','now'));
            }
        else{
            $products = Product::all();
            $categories = Category::all();
            $now = Carbon::now();
            
            return view('products/products')->with(compact('products','categories','now'));
        }
    }

    public function createProducts(){
        if (Auth::user()){
            $categories = Category::all();
            return view('products/create')->with(compact('categories'));
        }
        else{
            return redirect()->back()->with('fail','U bent niet ingelogd!');
        }
    }
    public function editProduct($product_id){
        if (Auth::user()){
            $product = Product::findOrFail($product_id);
            $categories = Category::all();
            return view('products/edit')->with(compact('categories','product'));
        }
        else{
            return redirect('/')->with('fail','U bent niet ingelogd!');
        }
    }
    public function deleteProduct($product_id){
        if (Auth::user()){
            Product::where('id', $product_id)->delete();
            Spotlight::where('product_id', $product_id)->delete();
            return redirect('/products')->with('Product succesvol verwijderd');
        }
        else{
            return redirect('/')->with('fail','U bent niet ingelogd!');
        }
    }

    public function getDetail($product_id){
            if(Auth::user()){
                $role = Auth::user()->admin;
                $firstImage = Image::where('product_id', $product_id)->first();
                $images = Image::where('product_id', $product_id)->simplePaginate(15);
                $product = Product::findOrFail($product_id);
                $currentUserId = Auth::user()->id;
                $currentUserCredits = Auth::user()->credits;
                $allProductFundings = Fundings::where('product_id', $product_id)->limit(4)->get()->sortByDesc('created_at');
                $count = count($allProductFundings);
                $funded = Fundings::all()->where('product_id', $product_id)->sum('amount');
                $comments = Comment::all()->where('product_id', $product_id);
                return view('products/detail')->with(compact('product', 'currentUserId','currentUserCredits','funded', 'images', 'allProductFundings', 'firstImage', 'comments','count','role'));
            }
            else{
                $firstImage = Image::where('product_id', $product_id)->first();
                $images = Image::where('product_id', $product_id)->simplePaginate(15);
                $product = Product::findOrFail($product_id);
                $allProductFundings = Fundings::all()->where('product_id', $product_id);
                $funded = Fundings::all()->where('product_id', $product_id)->sum('amount');
                $comments = Comment::all()->where('product_id', $product_id);
                return view('products/detail')->with(compact('product','funded', 'images', 'allProductFundings', 'firstImage','comments'));
            }
        }
    
    public function postSave( Request $request){
        \request()->validate([
            'category' =>'required',
            'naam' => 'required',
            'intro' => 'required',
            'content' => 'required',
            'goal' => 'required',
            'deadline' => 'required',
        ]);
        $data = [
            'category_id' => request('category'),
            'naam' => request('naam'),
            'intro' => request('intro'),
            'content' => request('content'),
            'user_id' => Auth::user()->id,
            'goal' =>request('goal'),
            'deadline' =>request('deadline'),
        ];
      
        $product = Product::create($data);
        $createdProductId = Product::where('id', $product->id)->first()->id;
        $articleData = [
            'title' => request('naam'),
            'intro' => request('intro'),
            'content' => request('content'),
            'user_name' => Auth::user()->name,
            'type' => 'Create',
            'product_id' => $product->id,
        ];
        Article::create($articleData);
        return redirect(route('productDetail', $createdProductId))->with('succes', 'Product succesvol aangemaakt voeg afbeeldingen toe');
    }
    public function update($product_id){
        $product = Product::findOrFail($product_id);
        $categroies = Category::all();

        $data = [
            'category_id' => request('category'),
            'naam' => request('naam'),
            'intro' => request('intro'),
            'content' => request('content'),
            'goal' => request('goal'),
            'deadline' => request('deadline'),
            
        ];
        $product->update($data);
        $articleData = [
            'title' => request('naam'),
            'intro' => request('intro'),
            'content' => request('content'),
            'user_name' => Auth::user()->name,
            'type' => 'Edit',
            'product_id' => $product_id,
        ];
        Article::create($articleData);
        return redirect(route('productDetail', $product_id))->with('succes', 'Product succesvol aangepast');
    }

    //Funding functions

    public function fund($product_id, $amount){
        if(Auth::user()){
            //Find the current user and his/her credits
            $originalCredits = Auth::user()->credits;
            $newCredits = $originalCredits - $amount;
            //check if currentuser has enough credits to fund 20
            if($newCredits < 0){
                return redirect()->back()->with('fail', 'U heeft niet genoeg credits!');
            }else{
                $currentProduct = Product::where('id', $product_id)->first();
                // update currentuser, admin and productcreator their credits
                User::where('id', Auth::user()->id)
                ->update(['credits' => Auth::user()->credits - $amount]);
                $productCreator = User::where('id', $currentProduct->user_id)->first();
                User::where('id', $currentProduct->user_id)
                ->update(['credits' => $productCreator->credits + ($amount * 0.9)]);
                $findAdmin = User::where('admin', 'admin')->first();             
                User::where('admin', 'admin')
                ->update(['credits' =>  $findAdmin->credits + ($amount * 0.1)]);

                $data = [
                    'amount' => $amount * 0.9,
                    'product_id' => $product_id,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    
                ];
                Fundings::create($data);
                $articleData = [
                    'title' => $currentProduct->naam,
                    'intro' => $currentProduct->intro,
                    'content' =>  $currentProduct->intro,
                    'user_name' => Auth::user()->name,
                    'type' => 'Fund',
                    'product_id' => $product_id,
                ];
                Article::create($articleData);
                $mailClass = new FundMail();
                Mail::to($productCreator->email)->send($mailClass);
                return redirect()->back()->with('succes', 'Funded '. $amount .' credits ');
            }
        }else{
            return redirect()->back()->with('fail', 'U bent niet ingelogd! ');
        }

            
        }
    
        // Create PDF
        public function generatePDF($product_id)
        {
            $product = Product::where('id',$product_id)->first();
            $creator = User::where('id',$product->user_id)->first();
            $funded = Fundings::all()->where('product_id', $product_id)->sum('amount');
            $category = Category::all()->where('id', $product->category_id)->first()->name;
            $firstImage = Image::all()->where('product_id', $product_id)->first();
       
            $data = [
                'title' => $product->naam,
                'content' => $product->content,
                'category' => $category,
                'goal' => $product->goal,
                'funded' => $funded,
                'creator' => $creator->name,
                'email' => $creator->email,
                'filepath' =>$firstImage->filepath,
                'filename' =>$firstImage->filename,
            ];
            
            $pdf = PDF::loadView('products/PDF', array('data' => $data));
            return $pdf->download($product->naam.'.pdf');
        }
        public function spotlight($product_id){           
            $product = Product::where('id', $product_id)->first(); 
            $image = Image::where('product_id', $product_id)->first();
            $userId = Auth::user()->id;
            $userCredits = User::where('id', $userId)->first()->credits;
            $newCredits = $userCredits - 200;
            if($newCredits < 0){
                return redirect()->back()->with('fail','niet gelukt!');

            }else{
                $check = Spotlight::where('product_id', $product_id)->first(); 
                if($check === null){
                    User::where('id', $userId)
                    ->update(['credits' => $newCredits]);
                    $data = [
                        'product_id' => $product_id,
                        'imagePath' => $image->filepath,
                        'imageName' => $image->filename,
        
                    ];
        
                    Spotlight::create($data);
                    return redirect()->back()->with('succes','gelukt!');
                }else{
                    return redirect()->back()->with('fail','Uw product staat al in de spotlight!');

                }
            }
        }
        public function comment(Request $request, $product_id){
          $currentUser = Auth::user();
          $message = request('comment');
          Comment::create([
            'product_id' => $product_id,
            'user_id' => $currentUser->id,
            'user_name' => $currentUser->name,
            'comment' => $message,
          ]);
          return redirect()->back()->with('succes', 'Reactie geplaatst');
        }
        public function getList($product_id){
            $fundings = Fundings::where('product_id', $product_id)->get();
            return view('products/list')->with(compact('fundings','product_id'));
        }
        public function deleteImage($image_id){
            $image = Image::where('id', $image_id)->first();
            $file= $image->filepath;
            if (Storage::exists($file)) {
                Storage::delete($image->filename);
            }
            $image->delete();
            return redirect()->back();
             
        }
}
