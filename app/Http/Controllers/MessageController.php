<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'secret' => 'required'
        ]);

        $message = Message::create([
            'content' => Crypt::encryptString($request->secret),
            'expires_at' => Carbon::now()->addMinutes(30),
            'status' => 'created'
        ]);

        return redirect()->route('secret.success', $message->id);
    }
    public function show($uuid)
    {
        $message = Message::find($uuid);

        if (!$message || $message->expires_at < now() || $message->status === 'revealed') {
            return view('expired');
        }

        $decrypted = Crypt::decryptString($message->content);

        $message->update([
            'status' => 'revealed',
            'revealed_at' => now()
        ]);

        return view('reveal', ['secret' => $decrypted]);
    }
}
