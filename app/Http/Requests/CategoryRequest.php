<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'status'   => ['required','in:1,0'],
            'parent_id'=> ['nullable','numeric'],
            'image'    => ['nullable','image'],
            'name_ar'  => ['required','string','min:2','max:255'],
            'name_en'  => ['required','string','min:2','max:255'],
        ];

        return $rules;

    }//end of rules

    protected function prepareForValidation()
    {
        return $this->merge([
            'status' => request()->status ? 1 : 0,
        ]);

    }//end of prepare for validation

}//end of request