<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $notifications = $request->user()->unreadNotifications()->latest()->take(5)->get();
            if ($notifications->count() === 0) {
                return '<span class="dropdown-item text-center text-muted">Aucune notification</span>';
            }
            $html = '';
            foreach ($notifications as $notif) {
                $data = $notif->data;
                $html .= '<a href="'.route('notifications.index').'" class="dropdown-item">';
                $html .= '<i class="fas fa-bell mr-2"></i> '.e($data['message'] ?? 'Notification');
                $html .= '<span class="float-right text-muted text-sm">'.($notif->created_at->format('d/m H:i')).'</span>';
                $html .= '</a><div class="dropdown-divider"></div>';
            }
            return $html;
        }
        $notifications = $request->user()->notifications()->paginate(20);
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->delete();
        
        return response()->json(['success' => true]);
    }

    public function getUnreadCount()
    {
        $count = Auth::user()->unreadNotifications()->count();
        
        return response()->json(['count' => $count]);
    }
} 