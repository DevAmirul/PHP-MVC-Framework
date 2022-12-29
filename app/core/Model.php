<?php

namespace App\Core;

abstract class Model {

    /**
     * @param array $data
     * @return void
     */
    public function loadData(array $data ) {
        foreach ( $data as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }
    }

    abstract function rules();

    public function validate() {

    }
}