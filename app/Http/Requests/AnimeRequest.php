<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AnimeRequest extends FormRequest
{

    public $validator = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param array $params
     * @return array
     */
    public function rules($params = [])
    {
        $rules = [
            'title'          => 'required|string|max:191',
            'original_title' => 'required|string|max:191',
            'french_title'   => 'required|string|max:191',
            'author'         => 'required|string|max:191',
            'year'           => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'synopsis'       => 'required'
        ];

        if (empty($params)) {
            return $rules;
        }
        return array_intersect_key($rules, $params);
    }


    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }

    protected function getValidatorInstance()
    {
        $rules = $this->isMethod('PATCH') ? $this->all() : [];

        $validator = \Illuminate\Support\Facades\Validator::make($this->all(), $this->rules($rules),
            $this->messages(),
            $this->attributes());
        return $validator;
    }
}
