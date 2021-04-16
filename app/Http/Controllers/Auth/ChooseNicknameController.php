<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChooseNicknameController extends Controller
{
    /**
     * Show form to create a new custom nickname
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // TODO: Verify if user already has a custom nickname
        return view('auth.choose-nickname');
    }

    public function store()
    {
        //
    }
}
