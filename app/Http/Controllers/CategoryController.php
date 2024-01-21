<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return [
            'all',
            'k0otakbas',
            'trucnsk',
        ];
    }
}
