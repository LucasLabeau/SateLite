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
    return view('website.search')
    -> with ('application', $application);
  }
  public function profile()
  {
    if(Auth::user() == null) {
      return redirect('login');
  }
  $applications = DB::select("select * from applications
  inner join users where applications.user_id = users.id");

  return view('auth.userProfile')
  -> with('applications', $applications);
  }
}
