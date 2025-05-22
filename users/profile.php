<?php
session_start();

require_once '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch total score and last quiz date directly with PDO
$userId = $_SESSION['user_id'];

try {
    $sql = "SELECT SUM(score) AS total_score, MAX(date_taken) AS last_quiz
            FROM scores WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $data = ['total_score' => 0, 'last_quiz' => 'Never'];
}

$totalScore = $data['total_score'] ?? 0;
$lastQuiz = $data['last_quiz'] ?? 'Never';
?>

<?php include '../includes/header.php'; ?>
<div class="container" style="padding: 2rem;">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?> 👋</h2>
    <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['user_email'] ?? 'N/A') ?></p>
    <hr>
    <h3>📊 Your Stats</h3>
    <p><strong>Total Score:</strong> <?= $totalScore ?></p>
    <p><strong>Last Quiz Taken:</strong> <?= $lastQuiz ?></p>

    <p style="margin-top: 2rem;"><a href="logout.php">🚪 Log Out</a></p>
</div>
<?php include '../includes/footer.php'; ?>
