<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTranslateRequest extends FormRequest
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
                 'unique:translates,canonical, '.$this->id
              ],
          ];
      }

      public function messages()
      {
          return [
               'name.required' => 'Tên ngôn ngữ không được để trống',
               'canonical.required' => 'Từ khóa không được để trống',
               'canonical.unique' => 'Từ khóa đã tồn tại',
          ];
      }
}
