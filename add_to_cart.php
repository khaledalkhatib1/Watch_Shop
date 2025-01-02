<?php
$host = 'localhost';
$dbname = 'watch_shop';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $watch_id = $_POST['watch_id'];

    $stmt = $pdo->prepare("SELECT * FROM cart WHERE watch_id = ?");
    $stmt->execute([$watch_id]);
    $cart_item = $stmt->fetch();

    if ($cart_item) {
        $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE watch_id = ?");
        $stmt->execute([$watch_id]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart (watch_id, quantity) VALUES (?, 1)");
        $stmt->execute([$watch_id]);
    }

    header('Location: watches.php'); 
    exit();
}
?>
