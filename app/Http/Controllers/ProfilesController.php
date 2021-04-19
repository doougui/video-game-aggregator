<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        return view('profiles.edit', ['user' => auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1024',
            'avatar' => 'file|mimes:jpg,png,jpeg|max:1000',
            'email' => 'string|required|email|max:255|unique:users,email,' . auth()->user()->id,
            'password' => 'nullable|between:8,25|confirmed',
        ]);

        if (request('avatar')) $validated['avatar'] = request('avatar')->store('avatars');

        auth()->user()->update($validated);

        return redirect(route('profiles.edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
