<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Redirect;
use App\Http\Requests\StoreLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.locations.index', ['locations' => Location::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $validatedData = $request->validated();

        $location = Location::create($validatedData);

        $request->session()->flash('success', 'You have created the location type.');

        return redirect(route('admin.locations.index'));
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
        return view('admin.locations.edit', 
        [
            'location'  => Location::find($id)        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocationRequest $request, $id)
    {
        $location = Location::find($id);
        
        if(!$location){
            $request->session()->flash('error', 'You can not edit this location.');
            return redirect(route('admin.locations.index'));
        }

        $validatedData = $request->validated();

        $location->update($validatedData);

        $request->session()->flash('success', 'You have edited the location.');

        return redirect(route('admin.locations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Location::destroy($id);

        $request->session()->flash('success', 'You have deleted the location.');

        return redirect(route('admin.locations.index'));
    }
}
