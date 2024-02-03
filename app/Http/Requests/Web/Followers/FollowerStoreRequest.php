<?php

namespace App\Http\Requests\Web\Followers;

use Illuminate\Foundation\Http\FormRequest;

class FollowerStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'follower_id',
            'following_id',
        ];
    }
}
