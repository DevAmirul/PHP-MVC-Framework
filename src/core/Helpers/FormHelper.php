<?php

if (!function_exists('put')) {
    function put(): string {
        return '<input type="hidden" name="_method" value="put">';
    }
}

if (!function_exists('patch')) {
    function patch(): string {
        return '<input type="hidden" name="_method" value="patch">';
    }
}

if (!function_exists('delete')) {
    function delete(): string {
        return '<input type="hidden" name="_method" value="delete">';
    }
}

if (!function_exists('csrf')) {
    function csrf(): void {
        if (!isset($_SESSION["csrf"])) {
            $_SESSION["csrf"] = bin2hex(random_bytes(50));
        }
        echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
    }
}

function is_csrf_valid() {
    if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
        return false;
    }
    if ($_SESSION['csrf'] != $_POST['csrf']) {
        return false;
    }
    return true;
}
