<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

   public function __construct(

   ){

   }

   public function index(){
      if(Auth::check()){
         return redirect()->route('dashboard.index');
      }
      $config['meta_title'] = config('apps.login.index_meta_title');
      return view('backend.auth.login', compact('config'));
   }

   public function login(AuthRequest $request){
      if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
          return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công');
      }
      return redirect()->route('auth.index')->with('error','Email hoặc Mật khẩu không chính xác');
   }


   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('auth.index');
   }

   
}
