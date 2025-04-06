<?php
// Retrieve the username from the cookie if set
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : null;
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<?php if ($currentPage === 'index.php'): ?>
<div class="username">
    <?php if ($username): ?>
        <p>User Name: <?php echo htmlspecialchars($username); ?></p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p>Welcome, Guest!</p>
    <?php endif; ?>
</div>
<?php endif;?>