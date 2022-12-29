<?php

namespace App\Core;

class Response {

    /**
     * This method set http status
     *
     * @param integer $code
     * @return void
     */
    public function setHttpStatusCode(int $code ) {
        http_response_code( $code );
    }
}