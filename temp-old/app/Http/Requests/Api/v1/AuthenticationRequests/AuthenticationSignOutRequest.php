<?php

namespace App\Http\Requests\Api\v1\AuthenticationRequests;

use App\Http\Requests\Api\v1\AuthenticationRequests\AuthenticationRequest;

class AuthenticationSignOutRequest extends AuthenticationRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
