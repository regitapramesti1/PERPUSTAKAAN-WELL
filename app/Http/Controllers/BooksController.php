<?php

namespace App\Http\Controllers;

use App\Models\authors;
use App\Models\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Author;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'books' => books::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $authors = authors::get();
    return view('books.create', [
        'authors' => $authors,
    ]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
{
    $this->validate($request, [
        
        'title' => ['required'],
        'cover' => [ 'image'],
        'year' => ['required'],
        'authors_id' => ['required'],
    ]);

    $cover = null;

    if ($request->hasFile('cover')) {
        $cover = $request->file('cover')->store('covers');
    }

    $books = new books(); 

    
    $books->title = $request->title;
    $books->cover = $cover;
    $books->year = $request->year;
    $books->authors_id = $request->authors_id;

    $books->save();

    session()->flash('success', 'Data Berhasil Ditambah');
    return redirect()->route('books.index');
}

public function show($id) {
    //
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = books::find($id);
        $authors = authors::get(); 
        return view('books.edit', [
            'books' => $books,
            'authors' => $authors,
        ]);
    }
    public function update(request $request, $id)
    {
        $this->validate($request, [

            'title'=>['required'],
            'cover' => [ 'image'],
            'year'=>['required'],
            'authors_id'=>['required'],
        ]);
        
        $books = books::find($id);

        
    $cover = $books->cover;

    if($request-> hasFile('cover')){
        if ($cover != null){
        if(Storage::exists($cover)){
            Storage::delete($cover);
        }
        $cover= $request->file('cover')->store('covers');
    }
}

        $books->title = $request->title;
        $books->cover = $cover;
        $books->year = $request->year;
        $books->authors_id = $request->authors_id;
    
        $books->save();
        session()->flash('info', 'Data Berhasil Diperbarui');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $books = books::find($id);
        $books ->delete();
        session()->flash('danger', 'Data Berhasil Dihapus');
        return redirect()->route('books.index');
    }
    
    
}
