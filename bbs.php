<?php

// データベースに接続
$link = mysqli_connect('localhost', 'root', 'root');
if (!$link) {
    die('データベースに接続できません： ' . mysqli_connect_error());
}

// データベースを選択する
mysqli_select_db($link, 'oneline_bbs');

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 名前が正しく入力されているかチェック
    $name = null;
    if (!isset($_POST['name']) ||  !strlen($_POST['name'])) {
        $errors['name'] = '名前を入力してください';
    } else if (strlen($_POST['name'] > 40)) {
        $errors['name'] = '名前は40文字以内で入力してください。';
    } else {
        $name = $_POST['name'];
    }

    // コメントが正しく入力されているかチェック
    $comment = null;
    if (!isset($_POST['comment']) || !strlen($_POST['comment'])) {
        $errors['comment'] = 'ひとことを入力してください';
    } else if (strlen($_POST['comment'] > 200)) {
        $errors['comment'] = 'ひとことは200文字以内で入力してください。';
    } else {
        $comment = $_POST['comment'];
    }

    // エラーがなければ保存
    if (count($errors) === 0) {
        // 保存するためのSQL文を作成
        $sql = "INSERT INTO `post` (`name`, `comment`, `created_at`) values ('"
            . mysqli_real_escape_string($link, $name) . "' , '"
            . mysqli_real_escape_string($link, $comment) . "' , '"
            . date('Y-m-d H:i:s') . "')";

        // 保存する
        mysqli_query($link, $sql);
    }
}

?>
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