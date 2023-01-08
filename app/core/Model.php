<?php

namespace App\Core;

use App\Helpers\RULE;

abstract class Model {

    public array $rulesError = [];

    /**
     * Abstract rules method.
     */
    abstract function rules();

    /**
     * The loadData() method receives data from user input and assigns it to the model property.
     *
     * @return void
     */
    public function loadData() {
        foreach ( Application::$app->request->getBody() as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * This method passes the roles to the checkRules() method and if any errors are found then assigns them to the $this->rulesError = [] property.
     *
     * @return void
     */
    public function validate() {
        $CountError = 0;

        foreach ( $this->rules() as $attributes => $rules ) {
            $propertyValue = $this->$attributes;

            foreach ( $rules as $rule ) {
                $this->rulesError[$attributes][] = $this->checkRules( $propertyValue, $rule, $attributes );
            }
        }

        foreach ( $this->rules() as $key => $value ) {
            if ( $this->rulesError[$key][0] ) {
                $CountError ++;
            }
        }
        return ($CountError === 0) ? true : false ;
    }

    /**
     * This method check user input and return a error string from enum RULE::error() method.
     *
     * @param  string     $propertyValue
     * @param  array|RULE $rule
     * @return string
     */
    private function checkRules( string $propertyValue, array | RULE $rule ) {
        $ruleName = $rule;

        //If rule is an array,then set new ruleName
        if ( !is_object( $rule ) ) {
            $ruleName = $rule[0];
        }

        if ( $ruleName === RULE::REQUIRE && empty( $propertyValue ) ) {
            return RULE::error( $ruleName );
        }

        if ( $ruleName === RULE::EMAIL && !filter_var( $propertyValue, FILTER_VALIDATE_EMAIL ) ) {
            return RULE::error( $ruleName );
        }

        if ( $ruleName === RULE::MIN && $rule[1] > strlen( $propertyValue ) ) {
            return $this->stringReplace( $ruleName->name, $rule[1], RULE::error( $ruleName ) );

        }

        if ( $ruleName === RULE::MAX && $rule[1] < strlen( $propertyValue ) ) {
            return $this->stringReplace( $ruleName->name, $rule[1], RULE::error( $ruleName ) );
        }

        if ( $ruleName === RULE::MATCH && $propertyValue !== $this->{$rule[1]} ) {
            return $this->stringReplace( $ruleName->name, $rule[1], RULE::error( $ruleName ) );
        }
    }

    /**
     * This method replace error string and return a new replaced error string.
     *
     * @param  string     $find
     * @param  string|int $replace
     * @param  string     $errorString
     * @return string
     */
    private static function stringReplace( string $find, string | int $replace, string $errorString ) {
        return str_replace( $find, $replace, $errorString );
    }

    /**
     *Check if there are any errors.
     *
     * @param  string  $attribute
     * @return array|bool
     */
    public function hasError( string $attribute ) {
        return $this->rulesError[$attribute] ?? false;
    }

    /**
     * if there are any error then return first error of $rulesError[] array.
     *
     * @param  string $attribute
     * @return array|bool
     */
    public function getError( string $attribute ) {
        return $this->rulesError[$attribute][0] ?? false;
    }
}