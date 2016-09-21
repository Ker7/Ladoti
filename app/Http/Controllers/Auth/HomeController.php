<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Redirect;

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
        $field = Field::findOrFail($id);
        $field->markClicked();
        //echo "postIndex!".$id;
        
        //return Redirect::route('/'); 
/*todo edit add!!!
    echo '<div class="debug-bottom">GET<pre>';
    print_r($_GET);
    echo '</pre> </div>';
    echo '<div class="debug-bottom">POST<pre>';
    print_r($_POST);
    echo '</pre> </div>';
    echo '<div class="debug-bottom">_SERVER<pre>';
    print_r($_SERVER);
    echo '</pre> </div>';*/

    }
}
