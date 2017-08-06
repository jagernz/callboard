<?php

namespace App\Http\Controllers\Board;

use Auth;
use App\User;
use App\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = DB::table('boards')->paginate(5);
        return view('board.index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:boards',
            'description' => 'required'
        ]);

        $board = new Board();
        $board->title = $request->title;
        $board->description = $request->description;
        $board->author_name = Auth::user()->id;
        $board->save();

        $id = Board::orderby('id', 'desc')->first();

//        session()->flash('message','Create Successfully!');

        return redirect('/'.$id->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $board = Board::find($id);
        $authorName = $board->author->name;

        $access = false;

        if ( $board->author->id == @Auth::user()->id ) {
            $access = true;
        }

        return view('board.show', compact('board','authorName', 'access'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board, $id)
    {
        $board = Board::find($id);
        $authorName = $board->author->name;

        return view('board.edit', compact('board','authorName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $board = Board::find($id);
        $board->title = $request->title;
        $board->description = $request->description;
        $board->save();
        session()->flash('message','Your Ad: - '.$board->title.', was updated');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $board = Board::find($id);
        $board->delete();

        return redirect('/');
    }
}
