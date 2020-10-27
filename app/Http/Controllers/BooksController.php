<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BooksController extends Controller
{
    public function index()
    {
        return Books::all();
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
        if ($book) {
            return $book;
        }
        else {
            return $this->errorResponse("Book not found","500");
        }
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
        if ($book)
        {
            $book->name = $request->json()->get('name');
            $book->author = $request->json()->get('author');
            $book->description = $request->json()->get('description');
            $book->save();
            return $book;
        }
        else {
            $this->errorResponse("Book not found",500);
        }
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
        if ($book)
        {
            $book->delete();
        }
        else {
            return $this->errorResponse("Book not found","500");
        }
    }

    protected function errorResponse($message = null, $code)
    {
        return response()->json([
            'status'=>'Error',
            'message' => $message,
            'data' => null
        ], $code);
    }
}



