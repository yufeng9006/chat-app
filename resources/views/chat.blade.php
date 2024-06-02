<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Wenxin</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // 提交表单时阻止默认行为，并使用 AJAX 发送请求
            $('#chat-form').on('submit', function(e) {
                e.preventDefault();

                var question = $('#question').val();

                // 模拟 AJAX 请求
                $.ajax({
                    url: '/chat',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        question: question,
                        // 假设这里有一个模拟的答案字段，实际情况下你会从 API 获取答案
                        answer: 'Answer from Wenxin (mocked)'
                    },
                    success: function(response) {
                        // 假设服务器返回了新创建的对话的ID或其他信息，这里我们只模拟添加对话到列表
                        var newConversationHtml = '<li>' +
                            '<span>' + response.created_at + '</span><br>' +
                            '<strong>Question:</strong> ' + question + '<br><br>' +
                            '<span>' + response.updated_at + '</span><br>' + // 注意：在聊天应用中，updated_at 可能与 created_at 相同，或者没有更新
                            '<strong>Answer:</strong> ' + response.answer + '<br><br><br>' +
                            '</li>';
                        $('#conversation-history').prepend(newConversationHtml);

                        // 清空输入框以便输入新的问题
                        $('#question').val('');

                        // 显示成功消息（如果需要）
                        $('#success-message').show().delay(2000).fadeOut();
                    },
                    error: function(xhr, status, error) {
                        // 处理错误情况
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</head>
<body>
<meta name="csrf-token" content="{{ csrf_token() }}">

<h1>Chat with Wenxin</h1>

<div id="success-message" class="alert alert-success" style="display: none;">
    Question submitted successfully!
</div>

<form id="chat-form" action="{{ route('chat.store') }}" method="post">
    @csrf
    <div>
        <label for="question">Question:</label>
        <textarea name="question" id="question" rows="3" required></textarea>
    </div>
    <button type="submit">Submit</button>
</form>

<h2>Conversation History</h2>
<ul id="conversation-history">
    @foreach ($conversations as $conversation)
        <li>
             {{ $conversation->created_at }}<br>
            <strong>Question:</strong> {{ $conversation->question }}
            <br><br>{{ $conversation->updated_at }}<br>
            <strong>Answer: </strong> {{ $conversation->answer }}<br><br><br>
        </li>
    @endforeach
</ul>
</body>
</html>
