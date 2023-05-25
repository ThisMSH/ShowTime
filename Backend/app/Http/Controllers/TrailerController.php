<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use App\Http\Requests\StoreTrailerRequest;
use App\Http\Requests\UpdateTrailerRequest;
use App\Http\Resources\TrailerResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Laravel\Telescope\Telescope;

class TrailerController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Telescope::stopRecording();

        return $this->success(
            TrailerResource::collection(
                Trailer::orderBy('trailer')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrailerRequest $request)
    {
        Telescope::stopRecording();

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
     * Display the specified resource.
     */
    public function show(Trailer $trailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrailerRequest $request, Trailer $trailer)
    {
        Telescope::stopRecording();

        $request->validated();

        $trailer->update($request->all());

        return $this->success(new TrailerResource($trailer));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trailer $trailer)
    {
        Telescope::stopRecording();
        
        return $trailer->delete();
    }
}
