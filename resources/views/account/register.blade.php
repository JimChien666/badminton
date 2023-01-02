<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>註冊頁面</h1>
    <form action="register" method="POST">
        @csrf
        姓名：<input type="text" name="name"><br>
        email：<input type="text" name="email"><br>
        密碼：<input type="text" name="password"><br>
        <button type="submit">註冊</button>
    </form>
</body>

</html>
