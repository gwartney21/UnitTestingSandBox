<?php

namespace App\Http\Controllers;
use App\Models\concert;
use Illuminate\Http\Request;

class concertController extends Controller
{
    public function show($id)
    {
        $concert = concert::find($id);
        return view('show',['concert'=> $concert]);
    }
}
