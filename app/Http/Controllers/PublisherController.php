<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use Illuminate\Http\Request;


class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publisher.index', [
            'publishers' => publisher::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
{
    $this->validate($request, [
        'name'=>['required'],
        'address'=>['required']
    ]);
    $publisher = new publisher();

    $publisher->name = $request->name;
    $publisher->address = $request->address;

    $publisher->save();

    session()->flash('success', 'Data Berhasil Ditambah');
    return redirect()->route('publisher.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = publisher::find($id);
   return view('publisher.edit', [
    'publisher'=> $publisher,
   ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {
        $this->validate($request, [
            'name'=>['required'],
            'address'=>['required']
        ]);
        
        $publisher = publisher::find($id);
    
        $publisher->name = $request->name;
        $publisher->address = $request->address;
    
        $publisher->save();
        session()->flash('info', 'Data Berhasil Diperbarui');
        return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $publisher = publisher::find($id);
        $publisher ->delete();
        session()->flash('danger', 'Data Berhasil Dihapus');
        return redirect()->route('publisher.index');
    }
}
