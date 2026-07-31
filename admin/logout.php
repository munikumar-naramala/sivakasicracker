<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::logout();
header('Location: login.php');
exit;
