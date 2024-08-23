<?php

namespace App\Http\Controllers;

use App\Models\Review; 
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // GET /api/reviews
    public function index()
    {
        return Review::all();
    }

    // POST /api/reviews
    public function store(Request $request)
    {
        return Review::create($request->all());
    }

    // GET /api/reviews/{id}
    public function show($id)
    {
        return Review::findOrFail($id);
    }

    // PUT /api/reviews/{id}
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'pricedecimal' => 'required|numeric',
            // Validate other fields as needed
        ]);
    
        $review = Review::findOrFail($id);
        $review->update($request->only(['name', 'description', 'pricedecimal']));
    
        return response()->json($review, 200);
    }
       

    // DELETE /api/reviews/{id}
    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();
            return response()->json(['message' => 'Review deleted successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Review not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the review'], 500);
        }
    }
}
