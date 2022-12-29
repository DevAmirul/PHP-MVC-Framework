<?php

namespace App\Helpers;

enum RULE {
case REQUIRE ;
case EMAIL;
case MIN;
case MAX;
case MATCH;

    private static function error( $value ): string {
        return match( $value ) {
            RULE::REQUIRE=> 'The field is required',
            RULE::EMAIL => 'The field must be valid email address',
            RULE::MIN => 'Min length of this field must be {MIN}',
            RULE::MAX => 'Max length of this field must be {MAX}',
            RULE::MATCH=> 'The field must be same as {MATCH}',
        };
    }
    public static function checkRules( $propertyValue, $rule, $attributes ) {
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

            return RULE::stringReplace( RULE::MIN->name, $rule[1], RULE::error( $ruleName ));
        }

        if ( $ruleName === RULE::MAX && $rule[1] < strlen( $propertyValue ) ) {
            return RULE::error( $ruleName );
        }

        if ( $ruleName === RULE::MATCH && empty( $propertyValue ) ) {
            return RULE::error( $ruleName );
        }
    }

    private static function stringReplace( $find,$replace, $String ) {
        str_replace();
        echo '<pre>';
        var_dump( $stringReplace, $replaceString);
        echo '</pre>';
        exit;

    }
}
