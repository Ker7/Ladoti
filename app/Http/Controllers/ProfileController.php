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

class ProfileController extends Controller
{
    public function index(){
        //echo "ProfileControlle!";
        //Auth::user()->name;
        //$this->displayGet();
        if (isset(Input::get('form_name'))) {
            Auth::user()->setName(Input::get('name'));
        }
        return view('profile');
    }
    
    // HELPER FUNCTIONS //  
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
