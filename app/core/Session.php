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
    }

    /**
     * This method used to set flash message.
     *
     * @param  string $key
     * @param  string $value
     * @return void
     */
    public function setFlash( string $key, string $message ) {
        $_SESSION[self::$FLASH_KEY][$key] = [
            'remove'  => false,
            'message' => $message,
        ];
    }

    /**
     * This method return specific flush session.
     *
     * @param  string $key
     * @return string
     */
    public function getFlush( string $key ) {
        return $_SESSION[self::$FLASH_KEY][$key]['message'] ?? false;
    }

    /**
     * This method used to set session value.
     *
     * @param  string            $key
     * @param  array|string|int $value
     * @return void
     */
    public function set( string $key, array | string | int | object $value ) {
        $_SESSION[$key] = $value;
    }

    /**
     * This method return specific session value.
     *
     * @param  string $key
     * @return array|string|int
     */
    public function get( string $key ) {
        return $_SESSION[$key] ?? false;
    }

    /**
     * This method remove specific session value.
     *
     * @param  string $key
     * @return void
     */
    public function remove( string $key ) {
        unset( $_SESSION[$key] );
    }

    /**
     * This __destruct method remove flash session.
     * @return void
     */
    public function __destruct() {
        $flashMessages = $_SESSION[self::$FLASH_KEY] ?? [];

        foreach ( $flashMessages as $key => &$flashMessage ) {
            if ( $flashMessage['remove'] ) {
                unset( $flashMessages[$key] );
            }
        }
        $_SESSION[self::$FLASH_KEY] = $flashMessages;
    }
}
