<?php

namespace App\Http\Controllers;
use App\Models\Comic;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('pages.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upData = $request->all();

        $addComic = new Comic();
        $addComic->title = $upData['title'];
        $addComic->series = $upData['series'];
        $addComic->thumb = $upData['thumb'];
        $addComic->type = $upData['type'];
        $addComic->price = $upData['price'];
        $addComic->sale_date = $upData['sale_date'];
        $addComic->description = $upData['description'];
        $lastComicId = (Comic::orderBy('id', 'desc')->first()->id) +1;
        $addComic->slug = Str::slug($addComic->title . '-' . $lastComicId, '-');
        // dd($addComic);
        $addComic->save();

        return redirect()->route('comic.show', $addComic->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        return view('pages.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        // dd($comic);
        return view('pages.create', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $putData = $request->all();
        
        $modComic = Comic::where('slug', $slug)->first();
        $modComic->title = $putData['title'];
        $modComic->series = $putData['series'];
        $modComic->thumb = $putData['thumb'];
        $modComic->type = $putData['type'];
        $modComic->price = $putData['price'];
        $modComic->sale_date = $putData['sale_date'];
        $modComic->description = $putData['description'];
        
        $modComic->slug = Str::slug($putData['title'], '-');

        $modComic->save();

        return redirect()->route('comic.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
