<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderByDesc('created_at')->paginate(20);
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.contact_messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.contact_messages.index')->with('success', 'Message supprimé avec succès.');
    }

    public function export()
    {
        $messages = \App\Models\ContactMessage::orderByDesc('created_at')->get();
        $filename = 'messages_contact_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        $callback = function() use ($messages) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Date', 'Nom', 'Email', 'Sujet', 'Message']);
            foreach ($messages as $msg) {
                fputcsv($file, [
                    $msg->created_at->format('d/m/Y H:i'),
                    $msg->name,
                    $msg->email,
                    $msg->subject,
                    $msg->message
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
} 