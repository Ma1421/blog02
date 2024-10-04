<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// フォームから送信されたデータを取得
$title = $_POST['title'];
$content = $_POST['content'];

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続をチェック
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

// SQLクエリを準備
$sql = "INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())";

// プリペアドステートメントを作成
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $title, $content);

// クエリを実行
if ($stmt->execute()) {
    echo "新しい記事が投稿されました。";
    // 2秒後に投稿一覧ページにリダイレクト
    header("refresh:2;url=index.php");
} else {
    echo "エラー: " . $sql . "<br>" . $conn->error;
}

// 接続を閉じる
$stmt->close();
$conn->close();
?>
