<?php
// app/Http/Controllers/MessagingController.php
namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagingController extends Controller
{
    public function index($conversation_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // جلب المحادثات التي تخص المستخدم الحالي
        $conversations = Conversation::with('lastMessage', 'user')
            ->where('user_id', Auth::id())
            ->orWhere('other_user_id', Auth::id())
            ->get();

        // جلب الرسائل التي تخص المحادثة الحالية
        $messages = Message::where('conversation_id', $conversation_id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('Messaging', compact('conversations', 'messages'));
    }

    public function sendMessage(Request $request): \Illuminate\Http\RedirectResponse
    {
        // إنشاء رسالة جديدة
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id, // يجب تمرير معرف المستخدم المستلم
            'content' => $request->message_content,
            'conversation_id' => $request->conversation_id, // يجب تمرير معرف المحادثة
        ]);

        return redirect()->back(); // إعادة توجيه إلى صفحة الرسائل
    }
}
