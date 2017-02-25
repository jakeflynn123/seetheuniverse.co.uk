<?php

namespace App\Http\Controllers;

use App\categories;
use App\article;
use Gate;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        if (Gate::allows('see_all_categories')) {
            $categories = categories::all();

            return view('admin/categories', ['categories' => $categories]);
        }
        return view('/adminpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create_category')){

            $categories = categories::all();

            return view('admin/categories/create', ['categories' => $categories]);
        }
        return view('/adminpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|unique:articles|min:3|max:255',
            'content' => 'required',
        ]);

        $input = $request->all();

        categories::create($input);

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = categories::where('id',$id)->first();


        if(!$categories)
        {
            return redirect('/admin/categories');
        }
        return view('/admin/categories/show')->withcategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = categories::where('id',$id)->first();
        $articles = article::all();

        if(!$categories)
        {
            return redirect('/admin/categories');
        }
        return view('admin/categories/edit')->with('categories', $categories)->with('articles', $articles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = categories::findOrFail($id);

        $categories->articles()->sync($request->get('article', []));

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = categories::findorFail($id);

        $categories->delete();

        return redirect('/admin/categories');
    }
}
