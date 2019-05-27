<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{
    //
    public function createArticle(){
        return view('article/create');       

    }
    public function saveArticle(){
        $articleData = [
            'title' => request('naam'),
            'intro' => request('intro'),
            'content' => request('content'),
            'user_name' => Auth::user()->name,
            'type' => 'Bericht',
        ];
        Article::create($articleData);
        return redirect()->back()->with('succes', 'Bericht aangemaakt!');
    }
    public function getArticle($article_id){
        $article = Article::where('id', $article_id)->first();
        $image = Image::where('product_id', $article->product_id)->first();
        return view('article/detail')->with(compact('article', 'image'));       
    }

    public function editArticle($article_id){
        $article = Article::where('id', $article_id)->first();
        return view('article/edit')->with(compact('article'));       

    }
    public function deleteArticle($article_id){
        if (Auth::user()){
            Article::where('id', $article_id)->delete();
            return redirect()->back()->with('succes', 'Het artikel is verwijderd');
        }
        else{
            return redirect('/')->with('fail','U bent niet ingeogd!');
        }
    }
    public function updateArticle($article_id){
        $artile = Article::findOrFail($article_id);

        $data = [
            'title' => request('naam'),
            'intro' => request('intro'),
            'content' => request('content'),
            'user_name' => request('content'),
            'type' => request('type'),
            
        ];
        $artile->update($data);
        return redirect()->back()->with('succes', 'Het artikel is aangepast');
    }
}
