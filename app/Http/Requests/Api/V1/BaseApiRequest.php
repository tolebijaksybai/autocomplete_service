<?php

namespace App\Http\Requests\Api\V1;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class BaseApiRequest extends FormRequest
{
    /**
     * @throws Exception
     */
    protected function failedValidation(Validator $validator)
    {
        throw new Exception($validator->errors()->first(), Response::HTTP_BAD_REQUEST);
    }
}
