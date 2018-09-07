<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $books = Book::all();

        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $request->validate([
            'author' => 'required',
            'description' => 'required'
        ]);

        Book::create($book);

        return response()->json([
            'error' => false,
            'success' => true,
            'message' => 'Created Successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'author' => 'required',
            'description' => 'required'
        ]);

        $book->update($data);

        return response()->json([
            'error' => false,
            'success' => true,
            'message' => 'Updated Successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'error' => false,
            'success' => true,
            'message' => 'Deleted Successfully'
        ], 200);
    }
}
