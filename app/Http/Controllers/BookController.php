<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $books = Book::all();

        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required',
            'description' => 'required'
        ]);
        $request->merge(['user_id', auth()->id()]);

        DB::beginTransaction();

        try {
            Book::create($request->all());

            DB::commit();

            return response()->json([
                'error' => false,
                'success' => true,
                'message' => 'Created Successfully'
            ], 201);
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return Response
     * @throws \Exception
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'author' => 'required',
            'description' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $book->update($request->all());

            DB::commit();

            return response()->json([
                'error' => false,
                'success' => true,
                'message' => 'Updated Successfully'
            ], 200);
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return response()->json([
                'error' => false,
                'success' => true,
                'message' => 'Deleted Successfully'
            ], 200);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
