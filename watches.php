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

$query = $pdo->query("SELECT * FROM watches");
$watches = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Watches</title>
    <style>
        .watch-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .watch-card img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
        .watch-card button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .watch-card button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Available Watches</h1>
    <div>
        <?php foreach ($watches as $watch): ?>
        <div class="watch-card">
            <img src="<?= htmlspecialchars($watch['image_url']) ?>" alt="<?= htmlspecialchars($watch['name']) ?>">
            <h2><?= htmlspecialchars($watch['name']) ?></h2>
            <p><?= htmlspecialchars($watch['description']) ?></p>
            <p>Price: $<?= htmlspecialchars($watch['price']) ?></p>
            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="watch_id" value="<?= $watch['id'] ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
