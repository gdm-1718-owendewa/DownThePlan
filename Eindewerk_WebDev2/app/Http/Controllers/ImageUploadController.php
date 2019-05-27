<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class ImageUploadController extends Controller
{
    public function store(Request $request){
        if (Auth::user()){
            $rules = [
                'product_id' => 'required|numeric',
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048|required'
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return Redirect::back()->withInput()
                                        ->withErrors($validator)
                                        ->with('fail' , 'Er ging iets mis');
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
                return back()->with('succes','De afbeelding/-en zijn geupload');
            }
        }
        else{
            return redirect('/')->with('fail','U bent niet ingelogd!');
        }
        
    }
    private function storeImageToDatabase( $product_id, $filename, $filepath){
        
        $image = new Image();
        $image->product_id = $product_id;
        $image->filename = $filename;
        $image->filepath = $filepath;

        $image->save();
        
    }
}


