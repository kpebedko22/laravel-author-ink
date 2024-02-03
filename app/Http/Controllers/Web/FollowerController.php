<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Followers\FollowerStoreRequest;
use App\Models\Follower;

class FollowerController extends Controller
{
    public function store(FollowerStoreRequest $request)
    {
        //
    }

    public function destroy(Follower $follower)
    {
        //
    }
}
