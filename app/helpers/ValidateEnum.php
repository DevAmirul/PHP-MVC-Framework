<?php

namespace App\Helpers;

// enum ValidateEnum {
// case REQUIRE ;
// case EMAIL;
// case MIN;
// case MAX;
// case MATCH;
// }

enum Status:int {
case DRAFT     = 1;
case PUBLISHED = 2;
case ARCHIVED  = 3;

    public static function color( $t ): string {
        return match( $t ) {
            Status::DRAFT => 'grey',
            Status::PUBLISHED => 'green',
            Status::ARCHIVED => 'red',
        };
    }
}
// $s = Status::color(Status::ARCHIVED);
echo Status::ARCHIVED->value;