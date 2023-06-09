<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ShowResource;
use App\Models\Category;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(
            CategoryResource::collection(
                Category::all()
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $shows = $category->shows()
            ->orderBy('title')
            ->orderBy('season')
            ->get();

        return $this->success([
            'category' => new CategoryResource($category),
            'shows' => ShowResource::collection($shows)
        ]);
    }
}
