<?php

namespace App\Http\Controllers;

use App\Application;
use App\Order;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $applications = Application::paginate(3);
        $vac = compact('applications');
        return view('website.app.AppsList', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.app.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $application = Application::find($id);
      $comments = DB::select("select * from users
      inner join orders on orders.user_id = users.id
      right join comments on comments.order_id = orders.order_id");
        //$application = Application::find($id);
        //$users = User::all();
        //$orders = Order::all();
        //$comments = Comment::all();
        //dd($application);
        return view('website.app.appShow')
        -> with ('application', $application)
        -> with('comments', $comments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
