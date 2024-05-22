<?php
function validate_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, '.') !== false && strpos($email, '@') !== false) {
        return true;
    } else {
        return false;
    }
}
?>
