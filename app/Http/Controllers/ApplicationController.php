<?php

namespace App\Http\Controllers;

use App\Application;
use App\Order;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (null !== Auth::user()) {
          $order=[];
          $user = Auth::user()->id;
          $orders = DB::select("select * from orders where orders.user_id = $user");
          foreach ($orders as $key) {
            array_push($order, $key->application_id);
          }
        } else {
          $order = [0];
        }

        $applications = Application::paginate(6);
        //dd($order);
        return view('website.app.AppsList')
        -> with('applications', $applications)
        -> with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::user() == null) {
        return redirect('login');
    }
      $categorias = Category::all();
        return view('website.app.create')
        -> with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $reglas = [
          'name' => 'required',
          'description' => 'required',
          'image_url' => 'URL',
          'user_id' => 'required',
          'category_id' => 'required',
          'price' => 'required'
      ];

      $mensaje=['el :attribute es obligatorio'];

      $this->validate($request, $reglas, $mensaje);
      //$cover = $request->file('image_url')->store('img','public');
      $application = new Application($request->all());
      //$application->image_url = $image;

      $application->save();
      return redirect('/');
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
     public function showMade() {
       if(Auth::user() == null) {
         return redirect('login');
     }
     $applications = Application::all();
     return view('website.app.edit')
     -> with('applications', $applications);
     }
    public function edit($id)
    {
      if(Auth::user() == null) {
        return redirect('login');
    }
      if(Auth::user()->isDev == 0) {
        return redirect('home');
      }
        $application = Application::find($id);
        //dd($application);
        $categorias = Category::all();
        return view('website.app.upload')
        -> with('categorias', $categorias)
        -> with('application', $application);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $reglas = [
          'name'=>'required',
          'description'=>'required',
          'image_url' => 'URL',
          'category_id'=>'required',
          'price' => 'required',
      ];
      $mensaje = ['required' => 'el campo :attribute es obligatorio'];
      $this->validate($request, $reglas, $mensaje);
      $application = Application::find($id);
      $application->name = $request->input('name') !== $application->name ? $request->input('name') : $application->name;
      $application->description = $request->input('description') !== $application->description ? $request->input('description') : $application->description;
      $application->category_id = $request->input('category_id') !== $application->category_id ? $request->input('category_id') : $application->category_id;
      $application->image_url = $request->input('image_url') !== $application->image_url ? $request->input('image_url') : $application->image_url;
      $application->price = $request->input('price') !== $application->price ? $request->input('price') : $application->price;
      //dd($application);
      if($request->file('cover') !== null){
      $cover = $request->file('cover')->store('covers','public');
      $application->cover = $cover;
      }
      $application->save();
      return redirect('/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::find($id);
        $application -> delete();
        return redirect('/edit');
    }
}
