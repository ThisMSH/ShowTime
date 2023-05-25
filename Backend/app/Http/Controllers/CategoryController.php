<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ShowResource;
use App\Models\Category;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Laravel\Telescope\Telescope;

class CategoryController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Telescope::stopRecording();

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
        Telescope::stopRecording();
        
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
