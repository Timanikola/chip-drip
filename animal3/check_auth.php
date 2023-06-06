<?php
session_start();
if (empty($_SESSION["id"])) {
    header("Location: personal_account.php");
}
else{
    header("Location: form_page.php");
}