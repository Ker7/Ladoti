<?php

namespace App\Http\Controllers;

use App\Http\Requests;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Redirect;

use App\User as User;
use App\Field as Field;
use App\UserField as UserField;

use Carbon\Carbon;

use Illuminate\Support\Facades\Route as Route;

class HomeController extends Controller
{
    
    //protected $redirectTo = '/asd';
    
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
        $data = array(
            'userFields' => UserField::where('user_id', Auth::id())->get(),
            'openField'  => Input::get('field_id'),
            'specialWelcome' => $this->getWelcomeMessage());
        
        // /home aadressile suunatud Ajax request... Siin ei tohiks teha suurt?
        if(Request::ajax()){
            
            $str = "123";
            return $str;//Response::json(Request::all()); 
        }

        return view('home', $data);
    }
    
    /* 
     * Something was $_POST'ed to /Home
     */
    public function postIndex(){
        //$this->displayGet();
        //$this->displayMeth();
        
        if (null !== Input::get('field_id')) {
            $ufid = Input::get('field_id');
            $userField = UserField::findOrFail($ufid); 
            switch(Input::get('form_name')) {
                case('field_clicked'): return $this->processFormFieldClicked($ufid);
                case('field_active'): return $this->processFormFieldActive($ufid);
                case('field_public'): return $this->processFormFieldPublic($ufid);
                default: break;
            }
        }
        //print_r($request);
        
        return $this->index();

    }
    
    public function processFormFieldClicked($ufid){
        
        $userField = UserField::findOrFail($ufid); 
        $userField->toggleClicked();
        return $this->index();
    }
    public function processFormFieldActive($ufid){
        
        $userField = UserField::findOrFail($ufid); 
        $userField->toggleActive();
        return $this->index();
    }
    public function processFormFieldPublic($ufid){
        
        $userField = UserField::findOrFail($ufid); 
        $userField->togglePublic();
        return $this->index();
    }

    private function displayMeth(){
        $route = Route::current();
        $name = $route->getName();
        $actionName = $route->getActionName();
        echo "".$name."@".$actionName;
    }
    
    private function displayGet(){
        echo "<pre>";
        print_r (Input::get());
        echo "</pre>";
    }
    
    private function getWelcomeMessage() {
        $w = array(
            'hi!',
            'hello there!',
            'glad you came',
            'glad you made it',
            'so good you came! :)',
            'nice to see you!',
            'I\'m so happy to see you here! Though I\'m just a piece of code :\')
            ');
        return $w[Rand(0,count($w) - 1)];
    }
}
