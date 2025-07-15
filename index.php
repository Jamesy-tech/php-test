<?php
// Save submitted text
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["text"])) {
    $text = trim($_POST["text"]);
    file_put_contents("data.txt", $text . PHP_EOL, FILE_APPEND);
}

// Read saved data
$items = file_exists("data.txt") ? file("data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit and Show</title>
</head>
<body>
    <h1>Submit Something</h1>
    <form method="POST">
        <input type="text" name="text" placeholder="Type something..." required />
        <button type="submit">Submit</button>
    </form>

    <h2>Submitted Items:</h2>
    <ul>
        <?php foreach ($items as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
