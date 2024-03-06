<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(){

        return view('authors.index', [
            'authors' => Author::get(),
        ]);
    }
public function create()
    {
        return view('authors.create', [
            'classes' => Author::get(),
        ]);
    }

public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }
    
public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'photo' => ['image'],
        ]);
    
        $author = Author::findOrFail($id);

        $photo = $author->photo;

        if($request->hasFile('photo')){
            if ($photo != null){
                if (Storage::exists($photo)){
                    Storage::delete($photo);
                }
            }
            $photo = $request->file('photo')->store('photos');
        }
    
        $author->name = $request->name;
        $author->photo = $photo;
    
        $author->save();
    
        session()->flash('success', 'Data Berhasil Diperbarui.');
    
        return redirect()->route('authors.index');
    }
    
public function store(Request $request)
{
    $this->validate($request, [
        'name' => ['required'],
        'photo' => ['image'],
    ]);

    $photo = null;

    if($request->hasFile('photo')){
        $photo = $request->file('photo')->store('photos');
    }

    $author = new Author();

    $author->name = $request->name;
    $author->photo = $photo;

    $author->save();

    session()->flash('success', 'Data Berhasil Ditambahkan.');

    return redirect()->route('authors.index');
}
public function destroy($id)

{
    $author = Author::find($id);

    $author->delete();

    return redirect()->route('authors.index');
}
};