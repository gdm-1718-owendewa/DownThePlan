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


class AdminController extends Controller
{
    //
    public function getIndex(){
        if(Auth::user() && Auth::user()->admin =='admin'){
            return view('admin/adminhome');
        }
        else{
            return redirect()->back()->with('fail', 'U bent geen admin');
        }
    }
    //beginning categories
    public function getCategories(){
        $categories = Category::all();
        return view('admin/categories')->with(compact('categories'));
    }
    public function createCategorie(){
        return view('admin/categoriecreate');
     }
     public function categorieSave( Request $request){
        \request()->validate([
            'name' =>'required', 
        ]);
        $data = [
            'name' => request('name'),
        ];
        $categorie = Category::create($data);
        return redirect('admin/categories')->with('succes', 'Categorie succesvol aangemaakt');
    }
    public function editCategorie($categorie_id){
        $categorie = Category::where('id', $categorie_id)->first();
        return view('admin/categoriesedit')->with(compact('categorie'));
    }
    public function updateCategorie($categorie_id){
        $categorie = Category::findOrFail($categorie_id);

        $data = [
            'name' => request('name'),
        ];
        $categorie->update($data);
        return redirect('admin/categories')->with('succes', 'Categorie succesvol aangepast');
    }
    public function deleteCategorie($categorie_id){
        $categorie = Category::where('id', $categorie_id)->first();
        $categorie->delete();
        return redirect()->back()->with('succes', 'Categorie verwijderd');
    }
    //ending categories
    
    //beginning users

    public function getUsers(){
        $users = User::all();
        return view('admin/users')->with(compact('users'));
    }   
    public function editUsers($user_id){
        $user = User::where('id', $user_id)->first();
        return view('admin/usersedit')->with(compact('user'));
    }
    public function updateUsers($user_id){
        $user = user::findOrFail($user_id);
        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'credits' => request('credits'),
        ];
        $user->update($data);
        return redirect('admin/users')->with('succes', 'User succesvol aangepast');
    }
    public function deleteUsers($user_id){
        $user = User::where('id', $user_id)->first();
        $products = Product::where('user_id', $user_id);
        $admin = User::where('admin', 'admin')->first();
        $newCredits = $admin->credits + $user->credits;
        $admin->update([
            'credits' => $newCredits
        ]);
        $user->delete();
        $products->delete();
        
        return redirect()->back()->with('succes', 'User en user projects verwijderd');
    }
    //ending users

    //beginning articles
    public function getArticles(){
        $articles = Article::all();
        return view('admin/articles')->with(compact('articles'));
    }
    public function getFundings(){
        $fundings = Fundings::all();
        return view('admin/fundings')->with(compact('fundings'));
    }
    public function createFundings($product_id){
        $user = User::where('id', Auth::user()->id);
        return view('admin/fundingscreate')->with(compact('product_id','user'));
    }
    public function fundingsSave(Request $request){
        $product_id = request('product_id');
        $amount =  request('amount');
        $productUser = Product::where('id',$product_id)->first()->user_id;
        $userCredits = User::where('id',$productUser )->first()->credits;
        $adminCredits = User::where('admin','admin' )->first()->credits;
        $newUserCredits = $userCredits + $amount;
        User::where('id',$productUser)
                ->update(['credits' => $newUserCredits]);
        $newAdminCredits = $adminCredits - $amount;
        User::where('admin', 'admin')
                ->update(['credits' =>  $newAdminCredits]);

        $data = [   
            'amount' => request('amount'),
            'product_id' => request('product_id'),
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            
        ];
        Fundings::create($data);
        return redirect()->back()->with('succes', 'Fund aangemaakt');
    }
    public function deleteFundings($funding_id){
        $funding = Fundings::where('id', $funding_id)->first();
        $user = User::where('id', $funding->user_id )->first();
        $product = Product::where('id', $funding->product_id)->first();
        $productCreator = User::where('id', $product->user_id)->first();
        
        $userCredits = $user->credits;
        User::where('id',$funding->user_id)
        ->update(['credits' => $userCredits + $funding->amount]);
        $creatorCredits = $productCreator->credits;
        User::where('id',$productCreator->id)
        ->update(['credits' => $creatorCredits - $funding->amount]);
        $funding->delete();
        return redirect()->back()->with('succes', 'Funding verwijderd');
    }
    //ending users
}
