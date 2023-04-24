<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use HttpResponses;

    public function show(Request $request)
    {
        $request->user()->avatar = asset(Storage::url($request->user()->avatar));

        return $this->success($request->user());
    }
}
