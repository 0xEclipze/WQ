<?php
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<div class="container">
    <h2 style="margin-bottom: 1rem;">Leaderboard</h2>
    <table style="width: 100%; background: white; border-radius: 10px; box-shadow: var(--card-shadow);">
        <thead style="background: #f5f5f5;">
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Total Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("
                SELECT users.name, SUM(scores.score) AS total_score
                FROM scores
                JOIN users ON scores.user_id = users.id
                GROUP BY users.id
                ORDER BY total_score DESC
                LIMIT 10
            ");
            
            $rank = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$rank}</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>{$row['total_score']}</td>
                      </tr>";
                $rank++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
