<?php
session_start();
session_destroy();

header("Location: confirmationlogin.php");
exit;