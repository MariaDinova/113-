<?php
session_unset();
session_destroy();
$_SESSION = array();

header("Location: ".$_GLOBALS['BASE_PATH']);