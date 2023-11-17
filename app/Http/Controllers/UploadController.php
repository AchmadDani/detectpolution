<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $upload = new Upload();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $upload->image = $filename;
            $upload->user_id = auth()->id();

        }

        $upload->save();

        return redirect()->back();
    }
}