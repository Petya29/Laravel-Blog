<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class ArticlesController extends Controller
{
    public function getAll()
    {
        $articleList = Articles::get();
        return view('articles.articlesList', ['articles' => $articleList]);
    }

    public function getOneById($id)
    {
        $article = Articles::where('id', $id)->first();
        $comments = Comments::where('article_id', $id)->get();

        return view('articles.viewArticle',compact('article', 'comments'));
    }

    public function addArticle()
    {
        $categories = Categories::orderBy('id')->get();
        return view('articles.addArticle', compact('categories'));
    }

    public function storeArticle(Request $req)
    {
        $newArticle = new Articles();
        $newArticle->title = $req->input('title');
        $newArticle->full_text = $req->input('full_text');
        $newArticle->short_text = $req->input('short_text');
        $newArticle->author = $req->input('author');
        $newArticle->category_id = $req->get('category_id');

        $rules = [
            'title' => 'required',
            'full_text' => 'required|max:2000',
            'short_text' => 'required|max:300',
            'author' => 'required|min:3',
            'category' => 'required'
        ];

        $this->validate($req, $rules);

        $newArticle->save();

        return redirect()->route('articles.allArticles');
    }

    public function editArticle(Request $request, $id)
    {
    }

    public function storeComment(Request $req, $id) {
        $newComment = new Comments();
        $newComment->text = $req->get('comment');
        $newComment->author = Auth::user()->name;
        $newComment->article_id = $id;

        $newComment->save();

        return redirect()->route('articles.viewArticle', $id);
    }
}
