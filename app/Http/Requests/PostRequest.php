<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="PostRequest",
 *     required={"title", "content"},
 *     @OA\Property(property="title", type="string", example="Title post"),
 *     @OA\Property(property="content", type="string", example="Text post.")
 * )
 */
class PostRequest extends FormRequest
{
    /*public function authorize()
    {
        return true;
    }*/

    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['title'] = 'sometimes|required|string|max:255';
            $rules['content'] = 'sometimes|required|string';
        }

        return $rules;
    }
}
