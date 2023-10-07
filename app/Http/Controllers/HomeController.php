<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Form\Validator;

class HomeController extends BaseController {

    // public function __construct(Request $request){

    // }

    public function index() {
        return view('index', ['app' => 'ok']);
    }
    public function create(Request $request) {

        // $form = new Validator([
        //     'name'  => ['required', 'trim', 'max_length' => 2],
        //     'email' => ['required', 'email'],
        // ]);

        // if ($form->validate($request->input())) {
        //     return $form->getValues();
        // } else {
        //     return $form->getErrors();
        // }
        abort(404);
        // dd(session()->get('csrf'));
    }
}
