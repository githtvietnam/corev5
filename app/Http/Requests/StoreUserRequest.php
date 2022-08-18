<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
           'email' => [
               'required',
               'unique:users,email',
               'email'
           ],
           'password' => [
             'required',
             'min:6',
             'max:20'
          ],
           'user_catalogue_id' => [
               'not_in:0'
           ],
       ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên '.config('apps.user.module').' không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được sử dụng, hãy chọn 1 email khác',
            'user_catalogue_id.not_in' => 'Bạn chưa chọn '.config('apps.user_catalogue.module'),
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.mã' => 'Mật khẩu tối đa 20 ký tự',
        ];
    }
}
