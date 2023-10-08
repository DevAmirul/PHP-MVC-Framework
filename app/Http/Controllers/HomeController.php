<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

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

        $d = new Users();
        return $d->select(['name','email'])->last();
        return ($d->db->last());

        // $a =  $d->db;
        // return $d->action(function ($a) {

        //     $a->insert("account", [
        //         "name"  => "foo",
        //         "email" => "bar@abc.com",
        //     ]);

        //     $a->delete("account", [
        //         "user_id" => 2312,
        //     ]);
        // });

    }
}
