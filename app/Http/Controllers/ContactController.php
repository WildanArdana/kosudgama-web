<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);
        try {
            Mail::to('admin@kosudgama.com')->send(new ContactFormMail($data));
            return back()->with('success', 'Pesan Anda telah berhasil dikirim!');
        } catch (\Exception $e) {
            Log::error("Mail sending failed: " . $e->getMessage());
            return back()->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.');
        }
    }
}
