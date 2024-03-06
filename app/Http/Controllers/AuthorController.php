<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use App\Models\books;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author.index', [
            'authors' => Authors::get(),
        ]);
    }

    public function create(){

        
        return view ('author.create');
    }


public function store(request $request)
{
    
    $this->validate($request, [
        'name'=>['required'],
        'photo'=>['image']
    ]);

    $photo = null;

    if($request-> hasFile('photo')){
        $photo= $request->file('photo')->store('photos');
    }


    $author = new Authors();

    $author->name = $request->name;
    $author->photo = $photo;

    $author->save();

    session()->flash('success', 'Data Berhasil Ditambah');
    return redirect()->route('author.index');
}

public function edit($id)
{
    $author = Authors::find($id);
   return view('author.edit', [
    'author'=> $author,
   ]);
}
public function update(request $request, $id)
{
    $this->validate($request, [
        'name'=>['required'],
        'photo'=>['image']
    ]);
    
    $author = Authors::find($id);


    $photo = $author->photo;

    if($request-> hasFile('photo')){
        if ($photo != null){
        if(Storage::exists($photo)){
            Storage::delete($photo);
        }
        $photo= $request->file('photo')->store('photos');
    }
}

    $author->name = $request->name;
    $author->photo = $photo;

    $author->save();
    session()->flash('info', 'Data Berhasil Diperbarui');
    return redirect()->route('author.index');
}
public function destroy($id)
{
    $author = Authors::find($id);
    $author->books()->delete(); 
    $author ->delete();
    session()->flash('danger', 'Data Berhasil Dihapus');
    return redirect()->route('author.index');
}



public function show($authorId) {
    $author = Authors::with('books')->find($authorId);

    if (!$author) { // Handle the case where author is not found
    }

    return view('author.show', ['author' => $author]);
}


public function search(Request $request){
    $books = Books::query();

    if($request->has('search')){
        $books->where('title', 'LIKE', '%'.$request->search.'%');
    }

    $books = $books->get();


    return view('books.index', ['books' => $books]);
}

}