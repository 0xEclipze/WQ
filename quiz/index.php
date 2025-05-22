<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../users/login.php");
    exit;
}
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

$user_id = $_SESSION['user_id'];
$today = date('Y-m-d');

// Check if the user has already taken today's quiz
$stmt = $pdo->prepare("SELECT * FROM scores WHERE user_id = ? AND date_taken = ?");
$stmt->execute([$user_id, $today]);
$alreadyTaken = $stmt->rowCount() > 0;
?>

<?php include __DIR__ . '/../includes/header.php'; ?>

<?php if ($alreadyTaken): ?>
    <div class="card">
        <h2>You've already taken today's quiz!</h2>
        <p>Come back tomorrow for a new challenge.</p>
        <a href="../leaderboard.php" class="btn primary-btn">View Leaderboard</a>
    </div>
<?php else: ?>
    <div class="card">
        <h2>Vocabulary Quiz</h2>
        <form action="submit.php" method="POST">
            <p>1. What does "benevolent" mean?</p>
            <label><input type="radio" name="q1" value="a"> Evil or harmful</label><br>
            <label><input type="radio" name="q1" value="b"> Kind and well-meaning</label><br>
            <label><input type="radio" name="q1" value="c"> Boring or repetitive</label><br>

            <p>2. What is the opposite of "lucid"?</p>
            <label><input type="radio" name="q2" value="a"> Clear</label><br>
            <label><input type="radio" name="q2" value="b"> Bright</label><br>
            <label><input type="radio" name="q2" value="c"> Confused</label><br>

            <p>3. "Ephemeral" means:</p>
            <label><input type="radio" name="q3" value="a"> Long-lasting</label><br>
            <label><input type="radio" name="q3" value="b"> Short-lived</label><br>
            <label><input type="radio" name="q3" value="c"> Eternal</label><br>

            <br>
            <button type="submit">Submit Quiz</button>
        </form>
    </div>
<?php endif; ?>


<?php include __DIR__ . '/../includes/footer.php'; ?>
