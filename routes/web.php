<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;

// 聊天页面路由（GET 请求）
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

// 发送聊天消息路由（POST 请求）
Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');


Route::get('/upload', function () {
    return view('upload');
});

Route::post('/file-upload', [FileUploadController::class, 'store']);
