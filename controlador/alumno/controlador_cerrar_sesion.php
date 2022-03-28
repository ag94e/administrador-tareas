<?php
session_start();

session_destroy();

exit(json_encode([
    "status" => "1"
]));

?>