<?php

namespace App\Core;

class Request {

    /**
     * This function return user input path after remove all param and query
     *
     * @return string
     */
    public function getPath() {
        $path     = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos( $path, '?' );

        if ( $position === false ) {
            return $path;
        }

        return substr( $path, 0, $position );
    }

    /**
     * This function return user input method
     *
     * @return string
     */
    public function getMethod() {
        return strtolower( $_SERVER['REQUEST_METHOD'] );
    }

    /**
     * This function checks and returns whether the method is GET
     *
     * @return string
     */
    public function isGet() {
        return $this->getMethod() === 'get';
    }

    /**
     * This function checks and returns whether the method is POST
     *
     * @return string
     */
    public function isPost() {
        return $this->getMethod() === 'post';
    }

    /**
     * This function checks and returns whether input data valid or not
     * 
     * @return array
     */
    public function getBody() {
        $body = [];

        if ( $this->isGet() ) {
            foreach ( $_GET as $key => $value ) {
                $body[$key] = filter_input( INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS );
            }
        }

        if ( $this->isPost() ) {
            foreach ( $_POST as $key => $value ) {
                $body[$key] = filter_input( INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS );
            }
        }
        return $body;
    }
}