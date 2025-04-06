<?php
// Delete the cookies by setting them to expire in the past
setcookie('username', '', time() - 3600, '/');
setcookie('email', '', time() - 3600, '/');

// Automatically refresh the page using JavaScript
echo "<script>
    alert('You have been logged out!');
    window.location.href = 'index.php'; // Redirect to index.php after logout
</script>";
exit();
?>
