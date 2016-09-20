<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;

use App\Field as Field;
use App\User as User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Hello homecontroller here!";
        
        $currentUser = Auth::user();
        
        $userFields = $currentUser->getLinkedFields;
        
        $data = array(
            'userFields' => $userFields);
        
        //echo '<pre>';
        //print_r($userFields);
        //echo '</pre>';
        
        //$fields = \App\User()->createdFields();
        
        return view('home', $data);
    }
    
    public function postIndex(){
        
        $id = Input::get('field_id');
        echo "postIndex!".$id;
    }
}
