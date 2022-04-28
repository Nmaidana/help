<?php

namespace App\Http\Requests\Admin\DetailAssist;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDetailAssist extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.detail-assist.edit', $this->detailAssist);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id_assist' => ['sometimes', 'integer'],
            'id_user' => ['sometimes', 'integer'],
            'id_state' => ['nullable', 'integer'],
            'solution' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date'],

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }


}
