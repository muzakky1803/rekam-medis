<?php
if (!isset($_SESSION)) {
    session_start();
}

$adminName = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
?>

<nav class="navbar navbar-dark bg-primary p-3 text-white">
    <div class="container-fluid d-flex justify-content-between">
        <span class="navbar-text fw-bold">
            Dashboard Admin
        </span>
        <a href="../logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>
