<?php
function setMessage($text, $type = 'danger')
{
    $_SESSION['message'] = [$text, $type];
}
function showMessage()
{
    if (isset($_SESSION['message'])) {
        list($text, $type) = $_SESSION['message'];
        echo "<div class=\"alert alert-$type\">$text</div>";
        unset($_SESSION['message']);
    }
}
function setOldData($data)
{
    $_SESSION['old_data'] = $data;
}
function getOldData($key)
{
    return $_SESSION['old_data'][$key] ?? '';
}
function clearOldData()
{
    if (isset($_SESSION['old_data'])) {
        unset($_SESSION['old_data']);
    }
}