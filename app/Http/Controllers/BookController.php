<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Genre;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        
        if (\Request::get('genre')) {
            $genre = \Request::get('genre');
            $books = Genre::find($genre)->books()->paginate(10);

        } elseif (\Request::get('search')) {
            $search = \Request::get('search'); //<-- we use global request to get the param of URI
            $books = Book::where('name','like','%'.$search.'%')
                ->orderBy('name')
                ->paginate(10);
        } else {
            $books = Book::paginate(10);    
        }

        return view('book.index', compact('books', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id');
        return view('book.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $file = $request->file('image');
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        $book = Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'stock' => $request->stock,
            'ori_stock' => $request->ori_stock,
            'img_url' => $file->getClientOriginalName(),
        ]);
        $book->genres()->sync($request->input('genre_list'));

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::pluck('name', 'id');
        $genreList = $book->genres->pluck('id')->toArray();

        return view('book.edit', compact('book', 'genres', 'genreList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());

            $book = Book::find($id);
            $book->update([
                'name' => $request->name,
                'author' => $request->author,
                'stock' => $request->stock,
                'ori_stock' => $request->ori_stock,
                'img_url' => $file->getClientOriginalName(),
            ]);
        } else {
            $book = Book::find($id);
            $book->update([
                'name' => $request->name,
                'author' => $request->author,
                'stock' => $request->stock,
                'ori_stock' => $request->ori_stock,
            ]);
        }

        
        $book->genres()->sync($request->input('genre_list'));
        return redirect('/book/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/book');
    }

}
