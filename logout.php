<?php
session_start();
session_unset();
session_destroy();

// Send JavaScript alert and then redirect
echo "<script>
    alert('You have been logged out successfully!');
    window.location.href = 'index.html';
</script>";
exit();
?>
