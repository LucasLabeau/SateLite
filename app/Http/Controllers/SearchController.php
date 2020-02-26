<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
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
}
