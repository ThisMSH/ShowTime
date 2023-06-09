<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use App\Http\Requests\StoreTrailerRequest;
use App\Http\Requests\UpdateTrailerRequest;
use App\Http\Resources\TrailerResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class TrailerController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrailerRequest $request)
    {
        $request->validated();

        $trailer = Trailer::create([
            'user_id' => Auth::id(),
            'show_id' => $request->show_id,
            'title' => $request->title,
            'trailer' => $request->trailer
        ]);

        return $this->success(new TrailerResource($trailer));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrailerRequest $request, Trailer $trailer)
    {
        $request->validated();

        $trailer->update($request->all());

        return $this->success(new TrailerResource($trailer));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trailer $trailer)
    {
        return $trailer->delete();
    }
}
