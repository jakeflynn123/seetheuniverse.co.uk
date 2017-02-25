<?php

namespace App\Http\Controllers;
use App\article;
use App\categories;
use App\comments;
use Gate;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Gate::allows('see_all_articles')) {
            $articles = article::all();

            return view('admin/articles', ['articles' => $articles]);
        }
        return view('/adminpage');
    }

    public function edit($id)
    {
        // edit the user
        $articles = article::where('id',$id)->first();
        $categories = categories::all();
        $comments = comments::all();

        if(!$articles)
        {
            return redirect('/admin/articles');
        }
        return view('admin/articles/edit')->with('articles', $articles)->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $articles = article::findOrFail($id);
        $categories = $request->get('category');

        $articles->categories()->sync($categories);
        return redirect('/admin/articles');
    }

    public function show($id)
    {
        $articles = article::where('id',$id)->first();


        if(!$articles)
        {
            return redirect('/admin/articles');
        }
        return view('/admin/articles/show')->witharticles($articles);

    }

    public function create()
    {
        if (Gate::allows('create_article')){

            $articles = article::all();

            return view('admin/articles/create', ['articles' => $articles]);
        }
        return view('/adminpage');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|unique:articles|min:3|max:255',
            'content' => 'required',
        ]);

        $input = $request->all();

        article::create($input);

        return redirect('/admin/articles');

    }
    public function destroy($id)
    {
        $articles = article::findorFail($id);

        $articles->delete();

        return redirect('/admin/articles');
    }



}
