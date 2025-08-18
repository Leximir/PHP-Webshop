<?php

$_SESSION = [];
session_destroy();

$params = session_get_cookie_params();
setcookie('PHPSESID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

header("Location: /");
exit();