<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(){
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
    public function create(){
        return view('articles.create');
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ]);
        $content = Purifier::clean($request->get('content'),
            [
                'HTML.Allowed' => 'br,a[href]',
                'AutoFormat.RemoveEmpty' => true,
        ]);
        Article::create([
            'title' => $attributes['title'],
            'slug' => $attributes['slug'],
            'content' => $content,
        ]);
        return redirect()->route('dashboard');
    }
    public function show(Article $article){
        return view('articles.show', compact('article'));
    }
    public function edit(Article $article){
        return view('articles.edit', compact('article'));
    }
    public function update(Request $request, Article $article){
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ]);
        $content = Purifier::clean($request->get('content'),
            [
                'HTML.Allowed' => 'br,a[href]',
                'AutoFormat.RemoveEmpty' => true,
            ]);
        $article->update([
            'title' => $attributes['title'],
            'slug' => $attributes['slug'],
            'content' => $content,
        ]);
        return redirect()->route('dashboard');
    }
    public function destroy(Article $article){
        $article->delete();
    }
    public function articles(){
        $articles = Article::paginate(10);
        return view('articles.articles', compact('articles'));
    }
}
