<?php
session_start();
if (!isset($_SESSION['userinfo']) || empty($_SESSION['userinfo'])) {
    header("Location: index.php"); // Redirect to index
    exit();
}
  ?>