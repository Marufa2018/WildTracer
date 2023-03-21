<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use Redirect;
use App\Http\Requests\StoreAnimalRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.animals.index', ['animals' => Animal::all()]);
        //return Animal::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalRequest $request)
    {
        //dd($request);
        $validatedData = $request->validated();

        $animal = Animal::create($validatedData);

        $request->session()->flash('success', 'You have created the animal type.');

        return redirect(route('admin.animals.index'));
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
        return view('admin.animals.edit', 
        [
            'animal'  => Animal::find($id)        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnimalRequest $request, $id)
    {
        $animal = Animal::find($id);
        
        if(!$animal){
            $request->session()->flash('error', 'You can not edit this animal.');
            return redirect(route('admin.animals.index'));
        }

        $validatedData = $request->validated();

        $animal->update($validatedData);

        $request->session()->flash('success', 'You have edited the animal.');

        return redirect(route('admin.animals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Animal::destroy($id);

        $request->session()->flash('success', 'You have deleted the animal.');

        return redirect(route('admin.animals.index'));
    }
}
