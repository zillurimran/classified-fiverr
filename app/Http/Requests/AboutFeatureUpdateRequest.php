<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutFeatureUpdateRequest extends FormRequest
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
            'feature1_icon' => 'required',
            'feature1_title' => 'required',
            'feature1_subTitle' => 'required',
            'feature2_icon' => 'required',
            'feature2_title' => 'required',
            'feature2_subTitle' => 'required',
            'feature3_icon' => 'required',
            'feature3_title' => 'required',
            'feature3_subTitle' => 'required',
            'feature4_icon' => 'required',
            'feature4_title' => 'required',
            'feature4_subTitle' => 'required',
            'feature5_icon' => 'required',
            'feature5_title' => 'required',
            'feature5_subTitle' => 'required',
            'feature6_icon' => 'required',
            'feature6_title' => 'required',
            'feature6_subTitle' => 'required',
            'feature7_icon' => 'required',
            'feature7_title' => 'required',
            'feature7_subTitle' => 'required',
            'feature8_icon' => 'required',
            'feature8_title' => 'required',
            'feature8_subTitle' => 'required',
            'feature9_icon' => 'required',
            'feature9_title' => 'required',
            'feature9_subTitle' => 'required',
            'feature10_icon' => 'required',
            'feature10_title' => 'required',
            'feature10_subTitle' => 'required',
        ];
    }
}
