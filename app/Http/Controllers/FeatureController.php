<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    // GET /api/features
    public function index()
    {
        $features = Feature::all();
        return response()->json($features);
    }

    // POST /api/features
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $feature = Feature::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($feature, 201);
    }

    // GET /api/features/{id}
    public function show($id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['error' => 'Feature not found'], 404);
        }

        return response()->json($feature);
    }

    // PUT /api/features/{id}
    public function update(Request $request, $id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['error' => 'Feature not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $feature->update($request->only([
            'name',
            'description',
        ]));

        return response()->json($feature);
    }

    // DELETE /api/features/{id}
    public function destroy($id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['error' => 'Feature not found'], 404);
        }

        $feature->delete();

        return response()->json(['message' => 'Feature deleted successfully'], 200);
    }
}
