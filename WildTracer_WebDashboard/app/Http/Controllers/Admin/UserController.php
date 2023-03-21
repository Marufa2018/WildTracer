<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Redirect;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Gate;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
       return view('admin.users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //$validatedData = $request->validated();

        //$user = User::create($validatedData);
        //dd($request);

        $newUser = new CreateNewUser();
        
        $user = $newUser->create($request->only(['name', 'email', 'phone_number', 'password', 'password_confirmation']));
        
        //dd($user);
        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'You have created the user.');

        return redirect(route('admin.users.index'));
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
        return view('admin.users.edit', 
        [
            'roles' => Role::all(),
            'user'  => User::find($id)        
        ]);
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
        $rules = [

            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'required|max:11|min:11'

            ];

        $messages = [
            
            'name.required' => 'Name is missing',
            'email.required' => 'Email is missing',
            'phone_numberr.required' => 'Phone number is missing ',
            'phone_number.max' => 'Phone Number is to long',

            ];

        $user = User::find($id);

        if(!$user){
            $request->session()->flash('error', 'You can not edit this user.');
            return redirect(route('admin.users.index'));
        }

        $validatedData = $request->validate($rules, $messages);

        $user->update($validatedData);

        $request->session()->flash('success', 'You have edited the user.');

        return redirect(route('admin.users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //dd($id);
        User::destroy($id);

        $request->session()->flash('success', 'You have deleted the user.');

        return redirect(route('admin.users.index'));
    }
}
