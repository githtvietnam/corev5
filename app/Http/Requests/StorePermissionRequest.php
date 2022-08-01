<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
           'route' => [
               'required',
               'unique:permissions,route'
           ],
           'module' => [
             'required',
             'not_in:0'
          ],
      ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên '.config('apps.permisison.module').' không được để trống',
            'route.required' => 'Tên Route không được để trống',
            'route.unique' => 'Tên route đã tồn tại trong hệ thống',
            'module.not_in' => 'Bạn chưa chọn module',
        ];
    }
}
