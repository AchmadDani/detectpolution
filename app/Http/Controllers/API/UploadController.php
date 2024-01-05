<?php

namespace App\Http\Controllers\API;

use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UploadController
{
    public function index()
    {
        $uploads = Upload::all();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil seluruh data',
            'data' => [
                'upload' => $uploads,
            ],
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = $request->user()->id;

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads'), $imageName);

        $upload = Upload::create([
            'user_id' => $user_id,
            'image' => $imageName,
        ]);

        // return response()->json(['data' => $upload], 201);
        return response()->json([
            'success' => true,
            'message' => 'Upload Berhasil',
            'data' => [
                'upload' => $upload,
            ],
        ], 201);
    }

    public function show($id)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            return response()->json(['message' => 'Upload not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get by id Berhasil',
            'data' => [
                'upload' => $upload,
            ],
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            return response()->json(['message' => 'Upload not found'], 404);
        }

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Handle image upload logic here
            // ...
        }

        $upload->update($request->all());

        return response()->json(['upload' => $upload], 200);
    }

    public function destroy($id)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            return response()->json(['message' => 'Upload not found'], 404);
        }

        $upload->delete();

        return response()->json(['message' => 'Upload deleted successfully'], 200);
    }
}
