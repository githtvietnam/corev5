<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct(){

   }

   public function index(){

      $config['meta_title'] = 'Dashboard';
      $template = 'backend/dashboard/home/index';
      return view('backend/dashboard/layout/home' , compact('template', 'config'));
   }

}
