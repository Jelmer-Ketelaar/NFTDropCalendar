<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        Mail::raw(
            $validated['message'] . ' Name: ' . $validated['name'],
            function ($mail) use ($validated) {
                $mail->to('info@nftdropcalendar.com')
                    ->from($validated['email'])
                    ->subject($validated['subject']);
            }
        );

        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
