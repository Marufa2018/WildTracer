<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instance;
use App\Models\Animal;
use App\Models\Location;
use App\Models\Route;
use App\Http\Requests\StoreInstanceRequest;
use App\Actions\Fortify\CreateNewUser;

class InstanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.instances.index', ['instances' => Instance::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instances.create', 
        [
            'animals'  => Animal::all(),
            'locations'  => Location::all(),
            'routes'  => Route::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'submitted_by' => 'required|max:255',
            'mobile' => 'required|min:11|max:11',
            'animal_type' => 'required',
            'location' => 'required',
            'month' => 'required',
            'year' => 'required|max:4|min:4',

            ];

        $messages = [
            
            'submitted_by.required' => 'Name is missing',
            'mobile.required' => 'Mobile Number is missing',
            'animal_type.required' => 'Animal Type is missing ',
            'mobile.max' => 'Phone Number is to long',
            'route.required' => 'Route is missing',
            'location.required' => 'Location is missing',
            'month.required' => 'Month is missing',
            'year.required' => 'Year is missing',
            'year.max' => 'Year is not valid'
    
            ];

        $request->validate($rules, $messages);

        $data = new Instance;

        $data->submitted_by = $request->submitted_by;
        $data->mobile= $request->mobile;
        $data->animal_type = $request->animal_type;
        $data->location = $request->location;
        $data->route = $request->route;
        $data->month = $request->month;
        $data->year = $request->year;
        //dd($data);
        $data->save();

        $request->session()->flash('success', 'You have created the user.');

        return redirect(route('admin.instances.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('admin.instances.edit', 
        [
            'instance'  => Instance::find($id)        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Instance::destroy($id);

        $request->session()->flash('success', 'You have deleted the instance.');

        return redirect(route('admin.instances.index'));
    }
}
