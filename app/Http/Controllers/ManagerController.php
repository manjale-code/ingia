<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager');
    }
}
