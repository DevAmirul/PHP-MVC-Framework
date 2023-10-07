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
    function csrf(): string {
        return '<input type="hidden" name="_method" value="put">';
    }
}
