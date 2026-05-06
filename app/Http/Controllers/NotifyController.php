<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class NotifyController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $email = $request->input('email');

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            DB::table('notify')->insert(['email' => $email]);
        }

        return redirect()->route('home');
    }
}
