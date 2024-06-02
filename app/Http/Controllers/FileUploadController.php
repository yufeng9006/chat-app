<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileRecord;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $size = $file->getSize();

        $destinationPath = 'uploads';
        $file->move($destinationPath, $filename);

        // 记录上传文件的信息
        FileRecord::create([
            'name' => $filename,
            'size' => $size,
            'uploaded_at' => now(), // 假设你的数据库里有uploaded_at字段记录时间
        ]);

        return back()->with('success', '文件上传成功！');
    }
}
