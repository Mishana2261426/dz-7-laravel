<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\StoreBookRequest;

class BooksController extends Controller
{
    public function store(StoreBookRequest $request)
    {
    	$data = $request->only(['name', 'publish_year', 'author_id']);

    	$model = new Book();
    	$model->fill($data);
    	$model->save();

    	return response()->json([
    		"success" => true
    	]);
    }

    public function update(StoreBookRequest $request, Book $book)
    {
    	$data = $request->only(['name', 'publish_year', 'author_id']);

    	$book->fill($data);
    	$book->save();

    	return response()->json([
    		"success" => true
    	]);
    }

    public function delete(Book $book)
    {
    	$book->delete();

    	return response()->json([
    		"success" => true
    	]);
    }

    public function index()
    {
    	$books = Book::all();
    	
    	foreach ($books as $book) {
    		return response()->json([
    			"name" => $book->name,
    			"publish_year" => $book->publish_year,
    			"author_name" => $book->author->name,
    		]);
    	}
    }


}
