<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Resources\RatingResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request)
    {
        $request->validated();

        $rating = Rating::firstOrNew([
            'user_id' => Auth::id(),
            'show_id' => $request->show_id,
        ]);

        $isNewRating = $rating->exists;

        $rating->rating = $request->rating;
        $rating->save();

        $message = $isNewRating
            ? "Your rating has been updated successfully."
            : "Your rating has been added successfully.";

        return $this->success(
            new RatingResource($rating),
            $message
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $query = Rating::where('user_id', Auth::id())
            ->where('show_id', $id)
            ->first();

        if ($query) {
            return $this->success(new RatingResource($query));
        }

        return null;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        /**
         * Code I was using in the store function
         */
        // $query = Rating::where('user_id', Auth::id())
        //     ->where('show_id', $request->show_id)
        //     ->first();

        // if ($query) {
        //     $query->update($request->all());

        //     return $this->success(
        //         new RatingResource($query),
        //         "Your rating has been updated successfully."
        //     );
        // } else {
        //     $rating = Rating::create([
        //         'user_id' => Auth::id(),
        //         'show_id' => $request->show_id,
        //         'rating' => $request->rating
        //     ]);

        //     return $this->success(
        //         new RatingResource($rating),
        //         "Your rating has been added successfully."
        //     );
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
