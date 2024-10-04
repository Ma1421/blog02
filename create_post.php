<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事作成</title>
</head>
<body>
    <h1>新しい記事を作成</h1>
    <form action="submit_post.php" method="post">
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">内容:</label><br>
        <textarea id="content" name="content" rows="10" cols="50" required></textarea><br><br>
        
        <input type="submit" value="投稿">
    </form>
</body>
</html>
