<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();

        return view('admin', compact('uploads'));
    }

    public function approve($id)
    {
        $upload = Upload::findOrFail($id);
        $upload->user->update(['role' => 'premium']);

        return redirect()->back();
    }
}

