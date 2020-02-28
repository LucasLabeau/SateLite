<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  public function search(Request $request) {
    $search = $request->input('search');
    $application = DB::select("select * from applications WHERE name LIKE '%$search%'
    OR description LIKE '%$search%'");
    //dd($application);
    return view('website.search')
    -> with ('application', $application);

  }
  public function profile()
  {
    if(Auth::user() == null) {
      return redirect('login');
  }
  $user = Auth::user()->id;
  $orders = DB::select('select * from users
  inner join orders on users.id = orders.user_id
  inner join applications on applications.application_id = orders.application_id');
  //dd($orders);
  return view('auth.userProfile')
  -> with('orders', $orders);
  }
}
