<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


// resource controller
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'username' => ['required'],
            'password' => ['required', 'min:2', 'confirmed'],
            'password_confirmation' => ['required', 'min:2'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'country_id' => ['required'],
        ];

        $messages = [
            'first_name.required' => 'First Name is required.',
            'last_name.required' => 'Last Name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone is required.',
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.',
            'password_confirmation.required' => 'Confirm Password is required.',
            'gender.required' => 'Gender is required.',
            'date_of_birth.required' => 'Date of Birth is required.',
            'country_id.required' => 'Country is required.',
        ];

        $request->validate($rules, $messages);

        // $validator = Validator::make($request->all(), $rules, $messages);

        User::create($request->except(['_token', 'password_confirmation']));

        return redirect()->back()->with('success_message', 'User added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            // 'email' => ['required', 'email', 'unique:users,id,{$user->id}'], // it also works
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'phone' => ['required', 'numeric'],
            'username' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'country_id' => ['required'],
        ];

        $messages = [
            'first_name.required' => 'First Name is required.',
            'last_name.required' => 'Last Name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone is required.',
            'username.required' => 'Username is required.',
            'gender.required' => 'Gender is required.',
            'date_of_birth.required' => 'Date of Birth is required.',
            'country_id.required' => 'Country is required.',
        ];

        $request->validate($rules, $messages);
        
        $user->update($request->except(['_token']));

        return redirect()->back()->with('success_message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
