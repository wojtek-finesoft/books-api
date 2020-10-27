<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Books::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'author' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $book = new Books;
        $book->name = $request->json()->get('name');
        $book->author = $request->json()->get('author');
        $book->description = $request->json()->get('description');
        $book->save();
        return $book;
    }

    public function show($bookid)
    {
        $book = Books::find($bookid);
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookid)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'author' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $book = Books::find($bookid);
        $book->name = $request->json()->get('name');
        $book->author = $request->json()->get('author');
        $book->description = $request->json()->get('description');
        $book->save();
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookid)
    {
        $book = Books::find($bookid);
    }
}



