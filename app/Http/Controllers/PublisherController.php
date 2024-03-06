<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){

        return view('publishers.index', [
            'publishers' => Publisher::get(),
        ]);
    }
public function create()
    {
        return view('publishers.create', [
            'classes' => Publisher::get(),
        ]);
    }

public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.edit', compact('publisher'));
    }
    
public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
    
        $publisher = Publisher::findOrFail($id);
    
        $publisher->name = $request->name;
        $publisher->address = $request->address;
    
        $publisher->save();
    
        session()->flash('success', 'Data Berhasil Diperbarui.');
    
        return redirect()->route('publishers.index');
    }
    
public function store(Request $request)
{
    $this->validate($request, [
        'name' => ['required'],
    ]);

    $publisher = new Publisher();

    $publisher->name = $request->name;
    $publisher->address = $request->address;

    $publisher->save();

    session()->flash('success', 'Data Berhasil Ditambahkan.');

    return redirect()->route('publishers.index');
}

public function destroy($id)

{
    $publisher = Publisher::find($id);

    $publisher->delete();

    return redirect()->route('publishers.index');
}
};