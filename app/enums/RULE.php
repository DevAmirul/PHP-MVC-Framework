<?php

namespace App\Enums;

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
    public static function error( RULE $ruleName ): string {
        return match( $ruleName ) {
            RULE::REQUIRE=> 'The field is required',
            RULE::EMAIL => 'The field must be valid email address',
            RULE::MIN => 'Min length of this field must be MIN',
            RULE::MAX => 'Max length of this field must be MAX',
            RULE::MATCH=> 'The field must be same as MATCH',
        };
    }
}
