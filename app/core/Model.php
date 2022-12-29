<?php

namespace App\Core;
use App\Helpers\RULE;

abstract class Model {

    public array $rulesError = [];
    /**
     * @param array $data
     * @return void
     */
    public function loadData( array $data ) {
        foreach ( $data as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }

    }

    abstract function rules();

    public function validate() {
        foreach ( $this->rules() as $attributes => $rules ) {
            $propertyValue = $this->$attributes;

            foreach ( $rules as $rule ) {
                $this->rulesError[$attributes] = RULE::checkRules( $propertyValue, $rule, $attributes );
            }

        }
        echo '<pre>';
        var_dump($this->rulesError);
        echo '</pre>';
        exit;


    }
}