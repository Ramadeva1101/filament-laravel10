<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('auth.verify-email');
    }
}
