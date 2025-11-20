<?php

namespace App\TasksManager\Tasks\Http\Requests;

use App\TasksManager\Tasks\Enums\StatusValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $title
 * @property string $description
 * @property integer $status
 */
class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:255',
            'status' => [
                'required',
                'integer',
                'min:1',
                Rule::in(array_keys(StatusValue::VALUES)),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле должно быть заполнено',
            'title.string' => 'Поле должно содержать только буквы',
            'title.min' => 'Поле должно содержать минимум 1 символ',
            'title.max' => 'Поле может содержать максимум 255 символов',

            'description.required' => 'Поле должно быть заполнено',
            'description.string' => 'Поле должно содержать только буквы',
            'description.min' => 'Поле должно содержать минимум 1 символ',
            'description.max' => 'Поле может содержать максимум 255 символов',

            'status.required' => 'Поле должно быть заполнено',
            'status.string' => 'Поле должно содержать только целые числа',
            'status.min' => 'Поле должно содержать минимум 1 число',
            'status.in' => 'Недопустимое значение для статуса задачи',
        ];
    }
}
