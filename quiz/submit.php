<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../users/login.php");
    exit;
}

$answers = [
    'q1' => 'b',
    'q2' => 'c',
    'q3' => 'b',
];

$score = 0;

foreach ($answers as $question => $correctAnswer) {
    if (isset($_POST[$question]) && $_POST[$question] === $correctAnswer) {
        $score++;
    }
}

$user_id = $_SESSION['user_id'];
$date = date('Y-m-d');

$stmt = $pdo->prepare("INSERT INTO scores (user_id, score, date_taken) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $score, $date]);

header("Location: ../leaderboard.php");
exit;
