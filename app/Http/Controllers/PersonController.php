<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function all()
    {
        return 'all';
    }

    public function index($id)
    {
        return 'index';
    }
}
