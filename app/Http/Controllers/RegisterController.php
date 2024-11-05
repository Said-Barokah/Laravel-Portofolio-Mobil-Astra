<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class RegisterController extends Controller
{

    public function index()
    {
        return view('Register');
    }

}
