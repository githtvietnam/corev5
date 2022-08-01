<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostCatalogueRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
           'name' => [
               'required',
           ],
           'canonical' => [
               'required',
               'max:255',
               // 'unique:routers'
           ],
           'meta_title' => 'nullable|max:512',
           'meta_keyword' => 'nullable|max:512',
           'meta_description' => 'nullable|max:512',
       ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống',
            'canonical.required' => 'Đường dẫn không được để trống',
            'max' => 'Không được vượt quá :max kí tự ',
            'required' => 'không được để trống'
        ];
    }
}
