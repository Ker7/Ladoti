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
        //$this->displayGet();
        
        if(Request::ajax()){
            return "AJax@index";//Response::json(Request::all()); 
        }
        
        // Leia seotud UserFieldid, neilt saab datat Userfieldi kohta, aga Field ise ka on vaja leida!
        $linkedFields = UserField::where('user_id', Auth::id())->get();
        
        // Tee midagi selle stackiga! Et pärast See Objekt mis View'sse läheb, omaks [relations] väärtuses ka neid objekte!
        //$linkedFields->each(function ($item) {
        //    $thisField = $item->getField;
        //    $thisHabits = $item->getHabits;
        //    $thisHabits->each(function ($habit) use ($item) {
        //        $habit->getUnit;
        //        
        //        $habitDataLogs = $habit->getLogs()
        //                                ->whereDate('date_log', '>', new Carbon('last month'))
        //                                ->orderBy('date_log', 'asc')
        //                                ->get();
        //        
        //        //echo "Field: ".$item->getField->name.", log count: ".count($habitDataLogs)."<br />";
        //    });
        //    //////////print_r($item);
        //    //////////$habitTracker[] = $item->getHabits()->where('internal', 1)->first();
        //});
        
        //echo new Carbon('now');
        //echo new Carbon('last month');
        
        //print_r($habitTracker);
        //echo $habitTracker->comment . '; ';
        
        //foreach ($linkedFields as $key => $lf){
        //    print_r($lf->getHabits()->where('internal', 1)->first()->getLogs);
        //    //$linkedFields[$key]['logs'] = $lf->getHabits()->where('internal', 1)->first()->getLogs;
        //    //$a = $lf->getHabits()->where('internal', 1)->first()->getLogs;
        //}
        //$dlhabit = \App\UserField::find(8)->getHabits()->where('internal', 1)->first();
        //$dlogs = $dlhabit->getLogs;
        
        //echo "<pre>";
        //print_r($dlhabit);
        //foreach($dlogs as $log){
        //    echo '#' . $log->date_log . ' - ' . $log->value_decimal . '.<br />';
        //}
        //echo "</pre>";
        
        //Kui midagi muudeti, siis see field peaks lahti jääma
        $openField = Input::get('field_id');
        
        $w = array(
            'hi!',
            'hello there!',
            'glad you came',
            'glad you made it',
            'so good you came! :)',
            'nice to see you!',
            'I\'m so happy to see you here! Though I\'m just a piece of code :\')
            ');
        
        $sayS = $w[Rand(0,count($w) - 1)];
                
        $data = array(
            'userFields' => $linkedFields,
            'openField'  => $openField,
            'specialWelcome' =>$sayS);

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
}
