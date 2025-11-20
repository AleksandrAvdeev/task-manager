<?php

namespace App\TasksManager\Tasks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $limit
 * @property integer $offset
 */
class ListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => 'integer|min:1',
            'offset' => 'integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'limit.integer' => 'Значение должно содержать только целые числа',
            'limit.min' => 'Значение должно содержать минимум 1 число',

            'offset.integer' => 'Значение должно содержать только целые числа',
            'offset.min' => 'Значение должно содержать минимум 1 число',
        ];
    }
}
