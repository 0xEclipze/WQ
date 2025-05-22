<?php
if (!isset($base)) {
    $base = '/php/WordQuest';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordQuest</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</head>
<body>
<header>
        <div class="logo-container">
            <img src="assets/images/wordquestlogo.png" alt="WordQuest Logo" class="logo">
            <h1>WordQuest</h1>
        </div>
        <nav>
              <ul>
                  <li><a href="<?= $base ?>/index.php">Home</a></li>
                  <li><a href="<?= $base ?>/archive.php">Word Archive</a></li>
                  <li><a href="<?= $base ?>/leaderboard.php">Leaderboard</a></li>
                  <li><a href="<?= $base ?>/quiz/index.php">Quiz</a></li>
                  <li><a href="<?= $base ?>/about.php">About Us</a></li>

                  <?php if (isset($_SESSION['user_id'])): ?>
                      <li><a href="<?= $base ?>/users/profile.php">Profile</a></li>
                      <li><a href="<?= $base ?>/users/logout.php">Logout</a></li>
                  <?php else: ?>
                      <li><a href="<?= $base ?>/users/login.php">Login</a></li>
                      <li><a href="<?= $base ?>/users/register.php">Register</a></li>
                  <?php endif; ?>
              </ul>
          </nav>

        <div class="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </div>
</header>
