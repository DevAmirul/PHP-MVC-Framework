<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\DB;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class HomeController extends BaseController {

    public function index(Request $request) {
        return view('home');
    }

    public function create(Request $request) {
        dd(url('/public'));
        // $form = new Validator([
        //     'name'  => ['required', 'trim', 'max_length' => 2],
        //     'email' => ['required', 'email'],
        // ]);

        // if ($form->validate($request->input())) {
        //     return $form->getValues();
        // } else {
        //     return $form->getErrors();
        // }

        $d = DB::db()->query(
            "SELECT * FROM users WHERE <name> = :name ", [
                ":name" => "amirul",
            ]
        )->fetchAll();

        return ($d);

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
