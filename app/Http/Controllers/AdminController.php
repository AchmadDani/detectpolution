<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

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
        
            // Update role to 'premium'
            $upload->user->update(['role' => 'premium','status' => 'elite']);
        
            // Delete the upload record
            $upload->delete();
        
            return redirect()->back();
        }

        public function reject($id)
        {
            $upload = Upload::findOrFail($id);
        
            // Update role to 'premium'
            $upload->user->update(['status' => 'gagal']);
        
            // Delete the upload record
            $upload->delete();

            return redirect()->back();
        }
        
}
