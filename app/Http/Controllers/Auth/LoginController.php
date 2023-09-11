<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // use AuthenticatesUsers;
    use Auth;

    // ...

    protected function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
            $this->guard()->logout();
            return redirect()->route('verification.notice');
        }

        // Redirect ke halaman yang sesuai setelah berhasil login
        return redirect()->intended($this->redirectPath());
    }
}
