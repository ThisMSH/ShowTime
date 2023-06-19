<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Http\Requests\StoreRecommendationRequest;
use App\Http\Requests\UpdateRecommendationRequest;
use App\Http\Resources\RecommendationResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecommendationController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(RecommendationResource::collection(Recommendation::all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecommendationRequest $request)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $logo = "recommendations/logo/" . uniqid() . "." . $request->logo->getClientOriginalExtension();
            Storage::disk('public')->put($logo, file_get_contents($request->logo));
        }

        if ($request->hasFile('character')) {
            $character = "recommendations/character/" . uniqid() . "." . $request->character->getClientOriginalExtension();
            Storage::disk('public')->put($character, file_get_contents($request->character));
        }

        $recommendation = Recommendation::create([
            'user_id' => Auth::id(),
            'show_id' => $request->show_id,
            'color' => $request->color,
            'logo' => $logo,
            'character' => $character,
        ]);

        return $this->success(new RecommendationResource($recommendation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecommendationRequest $request, Recommendation $recommendation)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $logo = "recommendations/logo/" . uniqid() . "." . $request->logo->getClientOriginalExtension();
            Storage::disk('public')->put($logo, file_get_contents($request->logo));
            $recommendation->update(['logo' => $logo]);
        }

        if ($request->hasFile('character')) {
            $character = "recommendations/character/" . uniqid() . "." . $request->character->getClientOriginalExtension();
            Storage::disk('public')->put($character, file_get_contents($request->character));
            $recommendation->update(['character' => $character]);
        }

        $recommendation->update($request->except(['logo', 'character']));

        return $this->success(new RecommendationResource($recommendation));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recommendation $recommendation)
    {
        return $recommendation->delete();
    }

    /**
     * Display the specified resource.
     */
    public function showAnime()
    {
        $randomAnime = Recommendation::join('shows', 'recommendations.show_id', '=', 'shows.id')
            ->whereIn('shows.category_id', [3, 4])
            ->inRandomOrder()
            ->limit(2)
            ->get();

        return $this->success(RecommendationResource::collection($randomAnime));
    }

    /**
     * Display the specified resource.
     */
    public function showLiveAction()
    {
        $randomLiveAction = Recommendation::join('shows', 'recommendations.show_id', '=', 'shows.id')
            ->whereIn('shows.category_id', [1, 2])
            ->inRandomOrder()
            ->limit(2)
            ->get();

        return $this->success(RecommendationResource::collection($randomLiveAction));
    }
}
