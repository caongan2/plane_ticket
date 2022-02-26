<?php

namespace App\Http\Controllers;

use App\Models\MailAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewLogin()
    {
        return view('login');
    }

    /**
     *
     */
    public function login(Request $request)
    {
        $data = $request->only('login_id', 'password');
        if (Auth::attempt($data)) {
            session()->put('login', 'success');
            return redirect()->route('get-all');
        } else {
            session()->flash('login_error', 'Account not exits');
            return redirect()->route('login');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        session()->forget('login');
        session()->forget('different');
        return redirect()->back();
    }
}
