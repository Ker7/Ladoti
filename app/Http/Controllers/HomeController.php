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
     * Show the application Home dashboard.
     * Get User Fields and pass to view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$currentUser = Auth::user();  
        //$userFields = $currentUser->getLinkedFields;
        
        $data = array(
            'userFields' => Auth::user()->getLinkedFields);
        
        return view('home', $data);
    }
    
    /* 
     * Something was posted to /Home
     */
    public function postIndex(){
        
        switch(Input::get('form_name')) {
            case('field_clicked'): return $this->fieldWasClickedOn();
            default: break;
        }
        


    }
    
    public function fieldWasClickedOn(){
        
        $id = Input::get('field_id');
        
        $fieldModel = Field::findOrFail($id);
        $fieldModel->markClicked();
        
        return $this->index();
    }
    
}
