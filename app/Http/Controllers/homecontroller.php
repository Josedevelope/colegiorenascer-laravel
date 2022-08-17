<?php

namespace App\Http\Controllers;
use App\Models\{
    Curso
};

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    //

    public function index()
    {
        $curso=Curso::get();
        return view('home', compact('curso'));
    }
}
