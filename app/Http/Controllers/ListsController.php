<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ListsController extends Controller
{
    public function show()
    {
        return view('lists.show');
    }
}
