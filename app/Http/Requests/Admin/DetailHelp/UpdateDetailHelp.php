<?php

namespace App\Http\Requests\Admin\DetailHelp;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDetailHelp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.detail-help.edit', $this->detailHelp);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'help_id' => ['sometimes', 'integer'],
            'user_id' => ['sometimes', 'integer'],
            'state' => ['sometimes'],
            'solution' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date'],
            'category_id' => ['sometimes', 'integer'],

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

    public function getStateId()
    {
        return $this->get('state')['id'];
    }
}
