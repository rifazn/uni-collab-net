<?php

require_once('lib/common.php');
$pdo = getPDO();
session_start();

unset($_SESSION['logged_in_username']);
redirectAndExit('user.php');