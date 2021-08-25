<?php
require 'include/database.php';

$conn = getDB();

$results = pg_query($conn, "SELECT * FROM sirivat ORDER BY published_at ");

if ($results === false) {
    echo "Some error in your query idiot";
} else {
    $articles = pg_fetch_all($results);
}
?>
<?php require 'include/header.php'; ?>
    <body>

    <h1>My greetings to the world!</h1>

    <ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <article>
                <h2><a href="article.php?id=<?= htmlspecialchars($article['id']); ?>"><?= $article['title'];?></a></h2>
                <p><?= htmlspecialchars($article['content']); ?></p>
            </article>
        </li>
        <?php endforeach; ?>
    </ul>

    <a href="http://sa-dev.intern.ebroot.de:8080/new-article.php">Create New Article</a>

    </body>
<?php require 'include/footer.php'; ?>