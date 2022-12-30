<?php

namespace App\Helpers;

/**
 * RULE enum
 * this enum work for user input validation rules
 */

enum RULE {
case REQUIRE ;
case EMAIL;
case MIN;
case MAX;
case MATCH;

    /**
     * This method accept this enum rule name and match enum,then return a particular string
     *
     * @param  RULE $ruleName
     * @return string
     */
    private static function error( RULE $ruleName ): string {
        return match( $ruleName ) {
            RULE::REQUIRE=> 'The field is required',
            RULE::EMAIL => 'The field must be valid email address',
            RULE::MIN => 'Min length of this field must be MIN',
            RULE::MAX => 'Max length of this field must be MAX',
            RULE::MATCH=> 'The field must be same as MATCH',
        };
    }

    /**
     * This method check user input and return a error string from error() method
     *
     * @param  string     $propertyValue
     * @param  array|RULE $rule
     * @return string
     */
    public static function checkRules( string $propertyValue, array | RULE $rule ) {
        $ruleName = $rule;
        if ( !is_object( $rule ) ) {
            $ruleName = $rule[0];
        }

        if ( $ruleName === RULE::REQUIRE && empty( $propertyValue ) ) {
            return RULE::error( $ruleName );
        }

        if ( $ruleName === RULE::EMAIL && !filter_var( $propertyValue ) ) {
            return RULE::error( $ruleName );
        }

        if ( $ruleName === RULE::MIN && $rule[1] > strlen( $propertyValue ) ) {
            return RULE::stringReplace( $ruleName->name, $rule[1], RULE::error( $ruleName ) );

        }

        if ( $ruleName === RULE::MAX && $rule[1] < strlen( $propertyValue ) ) {
            return RULE::stringReplace( $ruleName->name, $rule[1], RULE::error( $ruleName ) );
        }

        if ( $ruleName === RULE::MATCH && empty( $propertyValue ) ) {
            return RULE::stringReplace( $ruleName->name, $rule[1], RULE::error( $ruleName ) );
        }
    }

    /**
     * This method replace error string and return a new replaced error string
     *
     * @param  string     $find
     * @param  string|int $replace
     * @param  string     $errorString
     * @return string
     */
    private static function stringReplace( string $find, string | int $replace, string $errorString ) {
        return str_replace( $find, $replace, $errorString );
    }
}
