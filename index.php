<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordQuest - Expand Your Vocabulary Daily</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Expand Your Vocabulary</h2>
                <p>One word at a time, every day.</p>
                <a href="#word-of-day" class="btn primary-btn">Today's Word</a>
            </div>
        </section>

        <section id="word-of-day" class="word-container">
            <div class="card">
                <div class="card-header">
                    <h3>Word of the Day</h3>
                    <span class="date">Loading date...</span>
                </div>
                <div class="word-content">
                    <h2 class="word">Loading...</h2>
                    <p class="pronunciation"></p>
                    <p class="part-of-speech"></p>
                    <p class="definition">Fetching definition...</p>
                    <p class="example"></p>
                </div>
                <div class="card-actions">
                    <button class="btn secondary-btn save-btn"><i class="far fa-bookmark"></i> Save</button>
                    <button class="btn primary-btn share-btn"><i class="fas fa-share-alt"></i> Share</button>
                </div>
                <div class="social-share-options">
                    <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="feature-box">
                <i class="fas fa-book feature-icon"></i>
                <h3>Learn Daily</h3>
                <p>Discover a new word every day to expand your vocabulary consistently.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-trophy feature-icon"></i>
                <h3>Compete</h3>
                <p>Join our leaderboard and compete with others to improve your ranking.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-question-circle feature-icon"></i>
                <h3>Test Yourself</h3>
                <p>Take personalized weekly quizzes based on the words you've learned.</p>
            </div>
        </section>

        <section class="cta">
            <h2>Never Miss a Word</h2>
            <p>Enable notifications to get your daily word delivered right to your device.</p>
            <button class="btn primary-btn" id="enable-notifications"><i class="fas fa-bell"></i> Enable Notifications</button>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/api.js"></script>
</body>
</html>
