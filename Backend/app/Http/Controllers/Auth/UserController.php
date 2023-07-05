<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

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
        $request->user()->avatar = asset(Storage::url($request->user()->avatar));

        return $this->success($request->user());
    }

    public function update(Request $request, User $user)
    {
        if (Auth::id() !== $user->id && Auth::user()->user_type !== 1) {
            return $this->error(null, 'You are not authorized to update this user\'s profile.', 403);
        }

        $request->validate([
            'name' => ['sometimes', 'string', 'max:64', 'min:3'],
            'username' => ['sometimes', 'string', 'max:32', 'min:3', 'not_regex:/\s+/', 'unique:'.User::class],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:'.User::class],
            'birthday' => ['sometimes', 'date', 'before:'.date('Y-m-d', strtotime('-13 years'))],
            'user_type' => ['sometimes', 'integer', 'between:0,2'],
            'avatar' => ['sometimes', 'nullable', 'file', 'mimes:png,jpeg,jpg,gif', 'max:2048'],
            'old_password' => ['sometimes', 'string'],
            'password' => ['sometimes', 'confirmed', Rules\Password::defaults()]
        ], [
            'username.not_regex' => 'White spaces are not allowed in the username.',
            'birthday.before' => 'You must be at least 13 years old.'
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->storePublicly('avatars', 'public');
            $user->update(['avatar' => $path]);
        }

        if ($request->password) {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $user->update(['password' => Hash::make($request->password)]);
            } else {
                return $this->error(null, 'The password is not correct.', 422);
            }
        }

        if (($request->user_type || $request->user_type === "0") && Auth::user()->user_type === 1) {
            $user->update(['user_type' => $request->user_type]);
        }

        $user->update($request->except(['avatar', 'old_password', 'password', 'user_type']));

        if (Auth::id() === $user->id) {
            return $this->success(null, 'Your profile has been updated successfully.');
        } else {
            return $this->success($user, "{$user->name}'s profile has been updated successfully.");
        }
    }

    public function destroy(User $user)
    {
        if (Auth::id() !== $user->id && Auth::user()->user_type !== 1) {
            return $this->error(null, 'You are not authorized to update this user\'s profile.', 403);
        }

        $user_name = $user->name;
        $user->delete();

        return $this->success(null, "{$user_name}'s profile has been deleted successfully.");
    }
}
