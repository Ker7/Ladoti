<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Redirect;

use App\User as User;
use App\Field as Field;
use App\UserField as UserField;

use Illuminate\Support\Facades\Route as Route;

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
        
        $this->displayMeth();
        
        $data = array();
        
        // User ID
        $id = Auth::user()->id;
        
        // Leia seotud UserFieldid, neilt saab datat Userfieldi kohta, aga Field ise ka on vaja leida!
        $linkedFields = \App\UserField::where('user_id', $id)->get();
        foreach ($linkedFields as $lf) {
            echo $lf->getField;     //pean selle tegema siis on datas kohe suhetena märgtud!
        //    $data[] = array(
        //        'id' => $lf->id,
        //        'name' => $lf->getField->name,
        //        'clicked' => $lf->clicked,
        //    );
        }
        //
        $data = array(
            'userFields' => $linkedFields);
            //'userFields' => Auth::user()->getLinkedUserFields);
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        //
        //echo "Seoseid: ".count($linkedFields);//count(Auth::user()->getLinkedFields);
        
        return view('home', $data);
    }
    
    /* 
     * Something was $_POST'ed to /Home
     */
    public function postIndex(){
        
        //$arr = array('field_clicked',
        //             'field_active');
        $this->displayGet();
        $this->displayMeth();
        
        if (null !== Input::get('field_id')) {
            $ufid = Input::get('field_id');
            $userField = UserField::findOrFail($ufid); 
            switch(Input::get('form_name')) {
                case('field_clicked'): return $this->processFormFieldClicked($ufid);
                case('field_active'): return $this->processFormFieldActive($ufid);
                default: break;
            }
        }
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
    public function processFormFieldActive2(){
        
        $this->displayGet();
        //echo "123122222222222222222222222222222222222222222222222223";
        //$userField = UserField::findOrFail($ufid); 
        //$userField->toggleActive();
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
}
