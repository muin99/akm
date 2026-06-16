<?php
require __DIR__ . '/../includes/bootstrap.php';
unset($_SESSION['admin_id'], $_SESSION['admin_name']);
session_regenerate_id(true);
header('Location: index.php?lang=' . rawurlencode(lang()));
