<?php

namespace App\Http\Requests\Api\V1;

class AirportSearchRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'query' => 'nullable|string|max:100',
        ];
    }
}
