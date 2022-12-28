<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;

class SiteController extends Controller {


    public function handelContact( Request $request ) {
        $body = $request->getBody();
        echo '<pre>';
        var_dump( $body );
        echo '</pre>';
        exit;

        // return 'hello';
    }

    public function showContact() {
        $params = ['name' => 'sabbir'];
        return $this->view( 'contact', $params );
    }
}
