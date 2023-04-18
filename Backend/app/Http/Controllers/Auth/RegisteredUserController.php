<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
// use Laravolt\Avatar\Avatar;
use Laravolt\Avatar\Facade as Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:64', 'min:3'],
            'username' => ['required', 'string', 'max:32', 'min:3', 'not_regex:/\s+/', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'birthday' => ['required', 'date', 'before:'.date('Y-m-d', strtotime('-13 years'))],
            // 'user_type' => ['sometimes', 'integer', 'between:0,2'],
            'avatar' => ['sometimes', 'nullable', 'file', 'mimes:png,jpeg,jpg,gif', 'max:2048'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        /**
         * storePublicly method can be used to store the uploaded file in a designated
         * location on the server and generate a unique filename for the file,
         * but it also makes the file accessible through a public URL
         */

        $path = null;

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->storePublicly('avatars', 'public');
        } else {
            $avatar = Avatar::create($request->name)->toBase64();
            $path = 'avatars/' . time() . "-" . $request->username . '.png';
            Storage::disk('public')->put($path, $avatar);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'birthday' => $request->birthday,
            // 'user_type' => $request->user_type,
            'avatar' => $path,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return response()->noContent();
    }
}
