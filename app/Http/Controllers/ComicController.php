<?php

namespace App\Http\Controllers;
use App\Models\Comic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ComicController extends Controller
{

    protected $validateFields = [
        'title' => 'required|min:2|max:100',
        'description' => 'required|min:10|max:255',
        'thumb' => 'required|active_url|URL|max:21844',
        'price' => 'required|numeric|max:8|min:1',
        'series' => 'nullable|max:100',
        'sale_date'=> 'required|date|after_or_equal:1895/05/05|before:2023/12/01',
        'type' => 'required|exists:comics,type',
    ];

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
        $types = DB::table('comics')->select('type as type_name')->distinct()->get();
        return view('pages.create', compact('types'));
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

        $validateData = $request->validate(
            [
                'title' => 'required|min:2|max:100',
                'description' => 'required|min:10|max:255',
                'thumb' => 'required|active_url|URL|max:21844',
                'price' => 'required|numeric|max:8|min:1',
                'series' => 'nullable|max:100',
                'sale_date'=> 'required|date|after_or_equal:1895/05/05|before:2023/12/01',
                'type' => 'required|exists:comics,type',
            ],
            [
                'title.required' => 'The title must exist.',
                'title.min' => 'The title must be longer than two words',
                'thumb.URL' => 'The thumb must be an url',
                'thumb.max' => 'Whatever you gave, was too dam long',
                'sale_date.before' => 'Do we sell comic from the future too?',
                'type.exists' =>  'Stop right there Html heker',
            ]
        );

        $addComic = new Comic();
        // $addComic->title = $upData['title'];
        // $addComic->series = $upData['series'];
        // $addComic->thumb = $upData['thumb'];
        // $addComic->type = $upData['type'];
        // $addComic->price = $upData['price'];
        // $addComic->sale_date = $upData['sale_date'];
        // $addComic->description = $upData['description'];

        $lastComicId = (Comic::orderBy('id', 'desc')->first()->id) +1;
        // $addComic->slug = Str::slug($upData['title'] . '-' . $lastComicId, '-');
        $upData['slug'] = Str::slug($upData['title'] . '-' . $lastComicId, '-');

        // $addComic->fill($upData);
        // $addComic->save();
        // oppure = 
        $addComic->create($upData);
        // dd($upData['title']);

        return redirect()->route('comic.show', $upData['slug'])->with('create', $upData['title']);

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
     * @param  string  $slug
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $putData = $request->all();
        
        $modComic = Comic::where('slug', $slug)->first();
        $putData['slug'] = Str::slug($putData['title'], '-');

        
        // $modComic->title = $putData['title'];
        // $modComic->series = $putData['series'];
        // $modComic->thumb = $putData['thumb'];
        // $modComic->type = $putData['type'];
        // $modComic->price = $putData['price'];
        // $modComic->sale_date = $putData['sale_date'];
        // $modComic->description = $putData['description'];
        // $modComic->slug = Str::slug($putData['title'], '-');
        
        
        // $modComic->fill($putData);
        // $modComic->save();
        // oppure = 
        $modComic->update($putData);

        return redirect()->route('comic.show', $modComic->slug)->with('update', $putData['title']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $destComic = Comic::where('slug', $slug)->first();
        $destComic->delete();
        // oppure = 
        // Comic::destroy($slug);

        return redirect()->route('comic.index')->with('delete', $destComic->title);
    }
}
