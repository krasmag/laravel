<?php

namespace App\Http\Controllers;

use App\AdminPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class MainController extends Controller
{
  public function index()
  {
    // $users = AdminPanel::all();
    $users = AdminPanel::orderBy('company')->paginate(10);
    return view('home',compact('users'));
  }
public function search(Request $request)
{
 $ser = $request->s;
 $users = AdminPanel::where('company', 'LIKE', "%{$ser}%")->orderBy('company')->paginate(10);
 return view('home',compact('users'));
}
public function company(Request $request)
{
    $com = $request->c;
    $users = AdminPanel::orderBy('company')->get();
    return view('company',compact('users','com'));
}
public function redact(Request $request)
{
    $red = $request->r;
    $users = AdminPanel::orderBy('company')->get();
    return view('redact',compact('users','red'));
}
public function dbredakt(Request $request)
{
    $com = $request->c;

    $users = AdminPanel::orderBy('company')->get();
    return view('sotrudniki',compact('com','users'));

}
public function delete(Request $request, $id)
{
    $red = $request->c;
    AdminPanel::destroy($id);
    $users = AdminPanel::orderBy('company')->get();
    return view('redact',compact('users','red'));
}
public function updatedb()
{
    $inputState = request('company');
    $adress = DB::table('admin_panels')->where('company', '=', $inputState)->value('adress');
    $adress2 = DB::table('admin_panels')->where('company', '=', $inputState)->value('adress2');
    $name= request('name');
    $email= request('email');
    $phone = request('phone');
    $id = request('id');
    AdminPanel::destroy($id);
    DB::table('admin_panels')->insert([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $inputState,
        'adress' => $adress,
        'adress2' => $adress2
     ]);
     return redirect('/');
}
}
