<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favs = Favorite::where('user_id', Auth::id())->get();

        if ($favs->count() > 0) {
            return $this->success(FavoriteResource::collection($favs));
        }

        return null;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteRequest $request)
    {
        $request->validated();

        $fav = Favorite::firstOrNew([
            'user_id' => Auth::id(),
            'show_id' => $request->show_id
        ]);

        $isNewFav = $fav->exists;

        if ($isNewFav) {
            $fav->delete();
            $message = "The show has been removed from your favorites successfully.";

            return $this->success(
                '',
                $message
            );
        } else {
            $fav->save();
            $message = "The show has been added to your favorites successfully.";

            return $this->success(
                new FavoriteResource($fav),
                $message
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $query = Favorite::where('user_id', Auth::id())
            ->where('show_id', $id)
            ->first();

        if ($query) {
            return $this->success(new FavoriteResource($query));
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
