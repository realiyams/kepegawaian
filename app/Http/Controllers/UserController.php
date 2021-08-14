<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        return view('user.list')
            ->with('users', User::orderBy('name', 'DESC')->get());
    }
}
