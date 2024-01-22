<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::with(request('with', []))
            ->Search(request('query'))
            ->orderBy(request('sort', 'name'), request('order', 'asc'))
            ->simplePaginate(request('limit'));
    }

    public function show(Category $category)
    {
        return $category->load(request('with',[]));
    }
}
