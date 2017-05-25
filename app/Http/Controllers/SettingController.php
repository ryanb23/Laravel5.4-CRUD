<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;

class SettingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $settings = Setting::where('active','=','1')->orderBy('order','asc')->get();
    $user_list = User::with('company')->get();

    $param = [
      'settings' => $settings,
      'user_list' =>$user_list
    ];
    return view('origin.list',$param);
  }
  public function manageSetting()
  {
    $settings = Setting::all();
    $param = [
      'settings' => $settings,
    ];
    return view('origin.setting',$param);
  }

  public function updateSetting(Request $request)
  {
      $order_list = $request->input('order');
      $active_list = $request->input('active');
      $id_list = $request->input('id');

      foreach($id_list as $key => $id)
      {
          $setting = Setting::find($id);
          $setting->order = $order_list[$key];
          $active = in_array($id, $active_list) ? '1' : '0';
          $setting->active = $active;
          $setting->save();
      }
      return redirect('origin');
  }
}
