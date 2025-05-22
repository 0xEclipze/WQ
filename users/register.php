<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
session_start();

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name && $email && $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                $msg = "⚠️ This email is already registered.";
            } else {
                $insert = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($insert);
                $stmt->execute([$name, $email, $hashedPassword]);

                $msg = "✅ Registration successful! <a href='login.php'>Log in</a>.";
            }
        } catch (PDOException $e) {
            $msg = "❌ Database error: " . $e->getMessage();
        }
    } else {
        $msg = "❌ All fields are required.";
    }
}
?>

<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="../assets/css/auth.css">


<div class="auth-box">
    <h2>Register</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p style="color: red;"><?= $msg ?? '' ?></p>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
