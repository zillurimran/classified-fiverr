<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'logo'                => 'image',
            'favicon'             => 'image',
            'app_title'           => 'required',
            'footer_description'  => 'required',
            'site_designer'       => 'required',
            'designer_route'      => 'required',
            'facebook'            => 'required',
            'twitter'             => 'required',
            'linkedin'            => 'required',
            'whatsapp'            => 'required',
        ];
    }
}
