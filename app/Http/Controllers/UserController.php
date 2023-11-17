<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $isPremium = $user && $user->role === 'premium';

        return view('index', compact('isPremium'));
    }
}
