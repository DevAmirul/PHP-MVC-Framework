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
            RULE::MIN => 'Min length of this field must be {min}',
            RULE::MAX => 'Max length of this field must be {max}',
            RULE::MATCH=> 'The field must be same as {match}',
        };
    }
    public static function checkRules( $propertyValue, $rule, $attributes ) {

        if ( empty( $propertyValue ) && $rule->name === RULE::REQUIRE->name ) {
            return RULE::error( $rule );
        }
        if ( empty( $propertyValue ) && $rule->name === RULE::REQUIRE->name ) {
            return RULE::error( $rule );
        }
        if ( empty( $propertyValue ) && $rule->name === RULE::REQUIRE->name ) {
            return RULE::error( $rule );
        }
        if ( empty( $propertyValue ) && $rule->name === RULE::REQUIRE->name ) {
            return RULE::error( $rule );
        }

        // return RULE::stringReplace($rulesError);
    }
    private static function stringReplace( array $rulesError ) {
        foreach ( $rulesError as $key => $error ) {

        }
    }

}
// echo gettype( RULE::EMAIL->value );
// echo RULEEnum::REQUIRE->name;
// enum Status:int {
// case DRAFT     = 1;
// case PUBLISHED = 2;
// case ARCHIVED  = 3;

//     public static function color( $t ): string {
//         return match( $t ) {
//             Status::DRAFT => Status::d(),
//             Status::PUBLISHED => 'green',
//             Status::ARCHIVED => 'red',
//         };
//     }
//     public static function d() {
//         return 'this is d';
//     }
// }
// // $s = Status::color(Status::ARCHIVED);
// echo gettype( Status::DRAFT );
