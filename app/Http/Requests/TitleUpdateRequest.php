<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleUpdateRequest extends FormRequest
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
            'banner_title' => 'required',
            'banner_subTitle' => 'required',
            'location_title' => 'required',
            'location_subTitle' => 'required',
            'category_title' => 'required',
            'category_subTitle' => 'required',
            'feature_title' => 'required',
            'feature_subTitle' => 'required',
            'subscribe_title' => 'required',
            'subscribe_subTitle' => 'required',
            'latest_ad_title' => 'required',
            'latest_ad_subTitle' => 'required',
            'testimonial_title' => 'required',
            'testimonial_subTitle' => 'required',
            'blog_title' => 'required',
            'blog_subTitle' => 'required',
            'about_section1_title' => 'required',
            'about_section1_subTitle' => 'required',
            'about_section2_title' => 'required',
            'about_section2_subTitle' => 'required',
            'about_section3_title' => 'required',
            'about_section3_subTitle' => 'required',
        ];
    }
}
