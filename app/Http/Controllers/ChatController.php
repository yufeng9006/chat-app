<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $conversations = Conversation::latest()->get();
        return view('chat', ['conversations' => $conversations]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string', // 假设你有一个服务或API来获取答案
        ]);

        // 这里你可以调用文心一言API或其他逻辑来获取答案
        // $answer = call_to_wenxin_api($validatedData['question']);

        // 假设我们直接存储示例答案
        $answer = '示例答案';



        $responseData = [
            'question' => $validatedData['question'],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'answer' => $answer,
        ];
        Conversation::create($responseData);

        return response()->json($responseData);
    }
}
