<!DOCTYPE html>
<html>
<head>
    <title>文件上传</title>
</head>
<body>

<form action="{{ url('file-upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="file">选择文件:</label>
    <input type="file" name="file" id="file">
    <button type="submit">上传文件</button>
</form>

</body>
</html>
