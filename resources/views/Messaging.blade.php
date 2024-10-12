<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messaging Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            background: #0073b1;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .chat-container {
            display: flex;
        }

        .sidebar {
            width: 30%;
            border-right: 1px solid #ddd;
            padding: 10px;
            overflow-y: auto;
        }

        .sidebar h2 {
            margin: 0 0 10px 0;
        }

        .conversation {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
        }

        .info {
            overflow: hidden;
        }

        .info strong {
            display: block;
        }

        .messages {
            flex: 1;
            padding: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        .message {
            display: flex;
            align-items: flex-start;
            margin: 10px 0;
        }

        .message-content {
            max-width: 70%;
            border-radius: 5px;
            padding: 10px;
            position: relative;
        }

        .message.received .message-content {
            background-color: #e6e6e6;
            text-align: left;
        }

        .message.sent .message-content {
            background-color: #0073b1;
            color: white;
            text-align: right;
        }

        .time {
            font-size: 0.8em;
            color: #999;
            position: absolute;
            bottom: -20px;
            right: 10px;
        }

        .message-form {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .message-form input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }

        .message-form button {
            padding: 10px 20px;
            border: none;
            background: #0073b1;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .message-form button:hover {
            background: #005f8d;
        }

    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Messages</h1>
    </header>
    <div class="chat-container">
        <div class="sidebar">
            <h2>Recent Conversations</h2>
            @foreach ($conversations as $conversation)
                <div class="conversation" onclick="selectConversation({{ $conversation->id }})">
                    <div class="avatar">
                        <img src="{{ $conversation->user->avatar }}" alt="{{ $conversation->user->name }}">
                    </div>
                    <div class="info">
                        <strong>{{ $conversation->user->name }}</strong>
                        <p>{{ $conversation->lastMessage->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="messages">
            @foreach ($messages as $message)
                <div class="message {{ $message->sender_id == Auth::id() ? 'sent' : 'received' }}">
                    <div class="avatar">
                        <img src="{{ $message->sender->avatar }}" alt="{{ $message->sender->name }}">
                    </div>
                    <div class="message-content">
                        <p>{{ $message->content }}</p>
                        <span class="time">{{ $message->created_at->format('H:i A') }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <form class="message-form" action="{{ route('sendMessage') }}" method="POST">
        @csrf
        <input type="hidden" name="conversation_id" id="conversation_id" value="">
        <input type="text" name="message_content" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>
</div>

<script>
    function selectConversation(conversationId) {
        document.getElementById('conversation_id').value = conversationId;
    }
</script>

</body>
</html>
