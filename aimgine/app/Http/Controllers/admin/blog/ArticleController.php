<?php

namespace App\Http\Controllers\admin\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use App\Models\Blog\Category;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.blog.articles.articles', compact('articles','categories'));
    }

    public function create(){
        $categories = Category::get();
        return view('admin.blog.articles.add',compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3',
        'position' => 'required|unique:blog_articles|digits_between:1,4']);
        $article = new Article();
        $article->name = $request['name'];
        $article->position = $request['position'];
        $article->metatags = $request['meta'];
        $article->article = $request['text'];
        $article->category_id = $request['category'];
        $article->save();

        return back()->withErrors('Article saved');
    }



    public function edit(Article $article){
        $categories = Category::orderBy('id', 'desc')->get();
        $articleContent = file_get_contents('content/articles/blog/'.$article->article);
        return view('admin.blog.articles.edit', compact('article','categories','articleContent'));
    }

    public function update(Request $request,Article $article){
        $this->validate($request, ['name' => 'required|min:3',
        'position' => 'required|unique:blog_articles,position,'.$article->id.'|digits_between:1,4']);
        $article->name = $request['name'];
        $article->position = $request['position'];
        $article->metatags = $request['meta'];
        $article->category_id = $request['category'];
        $article->save();
        return back()->withErrors('Article updated');
    }

    public function destroy(Request $request, Article $article) {
        $fileExists = file_exists('./content/articles/blog/' . $article->article);
        if($fileExists){
            unlink('./content/articles/blog/' . $article->article);
            $article->delete();
            return back()->withErrors('Article deleted');
        }else{
            return back()->withErrors('Something went wrong');
        }
    }
}
