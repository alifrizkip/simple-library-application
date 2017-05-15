<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Genre;
use App\User;

class ListController extends Controller
{
    public function index()
    {
        // dd(\Auth::check());
    	if (\Auth::guest()) {
            $genres = Genre::all();
        
            if (\Request::get('genre')) {
                $genre = \Request::get('genre');
                $lists = Genre::find($genre)->books()->paginate(10);

            } elseif (\Request::get('search')) {
                $search = \Request::get('search'); //<-- we use global request to get the param of URI
                $lists = Book::where('name','like','%'.$search.'%')
                    ->orderBy('name')
                    ->paginate(10);
            } else {
                $lists = Book::paginate(10);    
            }

            return view('list.index-not-logged', compact('lists', 'genres'));

        } elseif (\Auth::check()) {
            $count = \Auth::user()->books()->count();

            // $count = \Auth::user()->books()->where('book_id', )->count();

            $genres = Genre::all();
            
            if (\Request::get('genre')) {
                $genre = \Request::get('genre');
                $lists = Genre::find($genre)->books()->paginate(10);

            } elseif (\Request::get('search')) {
                $search = \Request::get('search'); //<-- we use global request to get the param of URI
                $lists = Book::where('name','like','%'.$search.'%')
                    ->orderBy('name')
                    ->paginate(10);
            } else {
                $lists = Book::paginate(10);    
            }

            return view('list.index', compact('lists', 'genres', 'count'));
        }

        
    }

    public function borrow(Request $request)
    {
        $id = $request->id;
        $userbook = \Auth::user()->books();
        $stock = Book::find($id)->stock - 1;

        $userbook->attach($id);
        $updateBook = Book::find($id)->update([
            'stock' => $stock,
        ]);
        
        return redirect('/');
    }

    public function returnBack(Request $request) 
    {
        $id = $request->id;
        $userbook = \Auth::user()->books();
        $stock = Book::find($id)->stock + 1;

        $userbook->detach($id);
        $updateBook = Book::find($id)->update([
            'stock' => $stock,
        ]);
        
        return redirect('/');   
    }

    public function send($id)
    {
        $users = User::pluck('name', 'id');

        // $userbook = \Auth::user()->books();
        // dd($userbook->updateExistingPivot(7, ['user_id' => 5]));

        return view('list.send', compact('users', 'id'));

    }

    public function sending(Request $request)
    {

        $user = $request->user_list;
        $book = $request->book_id;

        \Auth::user()->books()->updateExistingPivot($book, ['user_id' => $user]);

        return redirect('/');
        
    }
}
