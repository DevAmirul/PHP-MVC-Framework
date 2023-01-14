<?php

namespace App\Core\Form;

use App\Core\Model;

class Form {

    public Model $model;

    public function __construct( Model $model ) {
        $this->model = $model;
    }
    /**
     * Undocumented function
     *
     * @param  string $var
     * @return string
     */
    public function begin( string $attribute, string $method ) {
        echo sprintf( '<form action="%s" method="%s">', $attribute, $method );
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function end() {
        return '</form>';
    }

    public function field( string $labelName, string $inputType, string $name, string $class = null, ) {

        return sprintf(
            '<div class="mb-3">
                <label class="form-label">%s</label>
                <input type="%s" name="%s" class="form-control%s" value="%s"  >
                <span class="text-danger">%s</span>
            </div>',
            $labelName, $inputType, $name, $class, $this->model->{$name}, $this->model->getError( $name )
        );
    }

    public function submit( string | null $class = null, string $text, ) {
        return sprintf(
            '<button type="submit" class="btn btn-primary %s">%s</button>',
            $class,
            $text
        );

    }

}