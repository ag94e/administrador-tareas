<?php
session_start();

unset($_SESSION['usuario']);

exit(json_encode([
    "status" => "1"
]));

?>