<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
   public function index()
{
    $notif = Notification::where('user_id', Auth::id())
            ->latest()
            ->get();

    return view('warga.notifikasi', compact('notif'));
}

public function baca($id)
{
    $n = Notification::where('user_id', Auth::id())
            ->findOrFail($id);

    $n->update(['is_read' => true]);

    return back()->with('success', 'Notifikasi ditandai sudah dibaca ✅');
}
}

