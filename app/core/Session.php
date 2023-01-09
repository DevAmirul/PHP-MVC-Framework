<?php

namespace App\Core;

class Session {

    public static string $FLASH_KEY = 'flash message';

    public function __construct() {
        session_start();

        $flashMessages = $_SESSION[self::$FLASH_KEY] ?? [];

        foreach ( $flashMessages as $key => &$flashMessage ) {
            $flashMessage['remove'] = true;
        }

        $_SESSION[self::$FLASH_KEY] = $flashMessages;
        echo '<pre>';
        var_dump( $_SESSION[self::$FLASH_KEY] );
        echo '</pre>';

    }

    public function setFlash( $key, $value ) {
        $_SESSION[self::$FLASH_KEY][$key] = [
            'remove' => false,
            'value'  => $value,
        ];
    }

    public function getFlush( $key ) {
        return $_SESSION[self::$FLASH_KEY][$key]['value'] ?? false;
    }

    public function __destruct() {
        $flashMessages = $_SESSION[self::$FLASH_KEY] ?? [];

        foreach ( $flashMessages as $key => &$flashMessage ) {
            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }
        unset( $flashMessages );
    }
}
