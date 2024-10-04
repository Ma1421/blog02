<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 投稿を取得
$sql = "SELECT id, title, content, created_at FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ブログ</title>
</head>
<body>
    <h1>ブログ記事一覧</h1>
    <a href="create_post.php">新しい記事を作成</a>
    <hr>
    <?php
    if ($result->num_rows > 0) {
        // 出力データを各行ごとに表示
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["title"]. "</h2><p>" . $row["content"]. "</p><small>投稿日時: " . $row["created_at"]. "</small><hr>";
        }
    } else {
        echo "記事がありません。";
    }
    $conn->close();
    ?>
</body>
</html>