<?php

namespace App\Core;

class Response {

    /**
     * This method set http status code
     *
     * @param integer $code
     * @return void
     */
    public function setHttpStatusCode(int $code ) {
        http_response_code( $code );
    }
}