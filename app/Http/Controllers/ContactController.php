<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

final class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index', [
            'pageTitle' => 'Contact',
            'currentPage' => 'contact',
        ]);
    }

    /**
     * @throws ConnectionException
     */
    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
            'g-recaptcha-response' => ['required'],
        ]);

        $captcha = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        )->json();

        if (
            !($captcha['success'] ?? false)
            || ($captcha['score'] ?? 0) < 0.5
        ) {
            return back()
                ->withErrors([
                    'captcha' => 'Spam protection failed. Please try again.',
                ])
                ->withInput();
        }

        // Send mail here

        return back()->with('success', 'Message sent successfully.');
    }
}
