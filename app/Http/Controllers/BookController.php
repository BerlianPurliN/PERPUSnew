<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        return view('books.index', [
            'books' => Book::get(),
            'authors' => Author::all(),
        ]);
    }
public function create()
    {
        $authors = Author::all();
        $books = Book::get();
        return view('books.create', [
            'classes' => Book::get(),
            'authors' => Author::all(),
        ]);
    }
public function edit($id)
    {
        $publisher = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }
public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
    
        $book = Book::findOrFail($id);
    
        $book->title = $request->title;
        $book->cover = $request->cover;
        $book->year = $request->year;

    
        $book->save();
    
        session()->flash('success', 'Data Berhasil Diperbarui.');
    
        return redirect()->route('books.index');
    }
public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required',],
            'author_id' => ['required'],
        ]);

        $book = new Book();

        $book->title = $request->title;
        $book->cover = $request->cover;
        $book->year = $request->year;
        $book->authors_id = $request->author_id;

        $book->save();
       

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('books.index');
    }
    public function destroy($id)

    {
        $book = Book::find($id);
    
        $book->delete();
    
        return redirect()->route('books.index');
    }
};