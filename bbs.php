<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>

    <form action="bbs.php" method="post">
        名前：<input type="text" name="name"><br>
        ひとこと：<input type="text" name="comment" size="60"><br>
        <input type="submit" value="送信" name="submit">
    </form>
</body>
</html>