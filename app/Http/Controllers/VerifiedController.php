<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifiedController extends Controller
{
    public function verify()
    {
        $user = Auth::user();
        $user->user_type = 'verified';
        $user->save();

        return redirect()->back()->with('status', 'Usuario verificado correctamente.');
    }
}
