<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;

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
        ]);

        if (! auth()->user()->validate) {
            $validated = array_merge($validated, request()->validate([
               'password' => 'nullable|between:8,25|confirmed'
            ]));
        }

        if (request('avatar')) {
            $file = $validated['avatar'];
            $pathToFile = 'storage/' . $file->store('avatars');

            Image::make($pathToFile)->fit(600)->save($pathToFile);

            $validated['avatar'] = $file->hashName();
        }

        auth()->user()->update($validated);

        return redirect(route('profiles.edit'))
            ->with('success', 'Profile information successfully updated');
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
