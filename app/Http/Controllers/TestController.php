<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        if ($request->user()->can('create')) {
           return;
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->user()->can('delete')) {
            return ;
        }

    }
}
