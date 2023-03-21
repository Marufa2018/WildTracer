<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests\StoreRouteRequest;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.routes.index', ['routes' => Route::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.routes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRouteRequest $request)
    {
        $validatedData = $request->validated();

        $Route = Route::create($validatedData);

        $request->session()->flash('success', 'You have created the new Route.');

        return redirect(route('admin.routes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.routes.edit', 
        [
            'route'  => Route::find($id)        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRouteRequest $request, $id)
    {
        $route = Route::find($id);
        
        if(!$route){
            $request->session()->flash('error', 'You can not edit this route.');
            return redirect(route('admin.routes.index'));
        }

        $validatedData = $request->validated();

        $route->update($validatedData);

        $request->session()->flash('success', 'You have edited the route.');

        return redirect(route('admin.routes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Route::destroy($id);

        $request->session()->flash('success', 'You have deleted the route.');

        return redirect(route('admin.routes.index'));
    }
}
