<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show all author with their books
        $author = Author::with(['books'])->paginate(10);

        return AuthorResource::collection($author);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        // create new author
        $author = Author::create($request->validated());

        return response()->json([
            'message' => 'Successful add new Author',
            'data' => $author
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get spesific author
        $author = Author::with('books')->findOrFail($id);

        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, string $id)
    {
        // update an author
        $author = Author::findOrFail($id);

        $author->update($request->validated());
        return response()->json([
            'message' => 'Successful update an Author',
            'data' => $author
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // destroy an author
        $author = Author::findOrFail($id);

        $author->delete();
        return response()->json([
            'message' => 'Successful delete an Author'
        ], 200);
    }
}
