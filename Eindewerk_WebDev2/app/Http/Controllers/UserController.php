<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\User;


class UserController extends Controller
{
    //
    
    public function getProfile(){   
        if (Auth::user()){
            $user = Auth::user();
            $products = Product::all()->where('user_id', $user->id);
            $profilePic = Image::all()->where('user_id', $user->id)->first();
           
            return view('user/profile')->with(compact('user', 'products','profilePic'));
        }
        else{
            return redirect('/')->with('fail','Vergeet niet in te loggen');
        }
    }

    public function editProfile(){
        if (Auth::user()){
            $user = Auth::user();
            $profilePic = Image::where('user_id', Auth::user()->id)->first();
            return view('user/edit')->with(compact('user','profilePic'));
        }
        else{
            return redirect('/')->with('fail','Vergeet niet in te loggen');
        }
    }   
    public function updateProfile(Request $request){
        
        $name= request('naam');
        $email = request('email');

        User::where('id', Auth::user()->id)
            ->update([
                'name' => $name,
                'email' => $email,
            ]);
        return redirect()->back()->with('succes', 'Uw profiel is aangepast');
    }
    public function updateProfilePicture(Request $request){
        if (Auth::user()){
            $rules = [
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048|required'
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return Redirect::back()->withInput()
                                        ->withErrors($validator)
                                        ->with('fail' , 'Er ging iets mis met het uploaden van uw afbeelding');
            }
            if($request->hasFile('file')){
                $directory = 'product'.$request->product_id;

                foreach($request->file('file') as $image){
                    $name = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $filename = pathinfo($name, PATHINFO_FILENAME) . '-' . uniqid(5) . '.' . $extension;
                    $image->storeAs($directory, $filename, 'public');
                    $this->storeImageToDatabase($request->product_id, $filename, 'storage/'.$directory);
                }
                return back()->with('succes','U hebt een nieuwe profiel foto');
            }
        }
        else{
            return redirect('/')->with('fail','U bent niet ingelogd!');
        }
        
    }

    private function storeImageToDatabase( $product_id, $filename, $filepath){
        $profilePic = Image::where('user_id', Auth::user()->id)->first();
        if($profilePic){
            $profilePic->update([
                'filename' => $filename,
                'filepath' => $filepath,
            ]);
        }else{
            $image = new Image();
            $image->user_id = Auth::user()->id;
            $image->filename = $filename;
            $image->filepath = $filepath;
            $image->save();
        }
    }
}
