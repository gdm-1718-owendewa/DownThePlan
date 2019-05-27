<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
use App\Models\Spotlight;
use Illuminate\Support\Facades\Auth;
use App\Models\Fundings;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\User;
use Carbon\Carbon;


class PagesController extends Controller
{
    //
    public function getIndex(){
        $page = Page::where('id', 1)->first();
        $spotlights = Spotlight::where('created_at','>', Carbon::now()->subDays(7))->inRandomOrder()->limit(4)->get();
        $oldSpotlights = spotlight::where('created_at','<', Carbon::now()->subDays(7))->get();
        foreach ($oldSpotlights as $post) {
            $post->delete();
        }
        $articles = Article::where('created_at','>', Carbon::now()->subDays(2))->simplePaginate(6);
  
        return view('general/home')->with(compact('page', 'articles','spotlights'));
    }
    public function getAbout(){
        $page = Page::where('id', 2)->first();


        return view('general/about')->with(compact('page'));
    }
    public function getContact(){
        $page = Page::where('id', 3)->first();
       
        return view('general/contact')->with(compact('page'));
    }
    
    public function contactMail(Request $request){
        \request()->validate([
            'name' =>'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        $adminEmail = User::where('admin','admin')->first()->email;
        $mailClass = new ContactMail();
        Mail::to($adminEmail)->send($mailClass);

        return redirect()->back()->with('succes','Uw mail is verzonden');
    }
    public function getPolicy(){
        $page = Page::where('id', 4)->first();
        
        return view('general/policy')->with(compact('page'));
    }
    
}
