<?php

session_start();

session_destroy();

session_start();

$_SESSION['flash']['message'] = 'Você saiu da sua conta!';
$_SESSION['flash']['color'] = 'success';

header("Location: ../../");