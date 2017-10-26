<?php

namespace App\Http\Controllers;

class TutorialController extends BaseController {
    
    public function index(){
        return response()->json(array(
            [
                'title' => 'Tutorial 1',
                'content' => 'content 1'
            ],
            [
                'title' => 'Tutorial 2',
                'content' => 'content 2'
            ]
        ), 200);
    }

}