<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Telescope\Telescope;

class UserController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $totalUsers = User::count();
        $totalFree = User::where('user_type', '0')->count();
        $totalPremium = User::where('user_type', '2')->count();

        return $this->success([
            'users' => UserResource::collection(User::all()),
            'total_users' => (string)$totalUsers,
            'total_free' => (string)$totalFree,
            'total_premium' => (string)$totalPremium
        ]);
    }

    public function show(Request $request)
    {
        Telescope::stopRecording();

        $request->user()->avatar = asset(Storage::url($request->user()->avatar));

        return $this->success($request->user());
    }
}
