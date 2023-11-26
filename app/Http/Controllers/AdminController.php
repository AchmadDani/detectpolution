<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
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
        
            // Update role to 'premium'
            $upload->user->update(['role' => 'premium']);
        
            // Delete the upload record
            $upload->delete();
        
            return redirect()->back();
        }

        public function king() {
            return view('king');
        }
    
        public function getKoleksi(){
            $uploads = Upload::with('user')->get();
            $uploads = Upload::all();
            // dd($uploads);
            return DataTables::of($uploads)
            ->addColumn('image', function ($upload) {
                return '<img src="'.asset('storage/' . $upload->image).'" alt="Uploaded Image" width="100">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal'.$upload->id.'">
                            View Image
                        </button>';
            })
            ->addColumn('user', function ($upload) {
                return $upload->user ? $upload->user->name : 'User not available';
            })
            ->addColumn('action', function ($upload) {
                return '<form action="'.route('admin.approve', $upload->id).'" method="POST">
                            '.csrf_field().'
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
        }
        
}

