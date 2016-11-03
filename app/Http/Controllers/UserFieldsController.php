<?php

namespace App\Http\Controllers;

use App\Http\Requests;          //sest ajax
//use Illuminate\Http\Request;
use Request;

use Illuminate\Support\Facades\Input as Input;
use App\FHabits;
use App\UserField;

class UserFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $openField  = Input::get('userfield_id');
        $userField = UserField::where('id', $openField)->first();

        $hab = FHabits::where('userfield_id', '=', $openField)->get();
        
        $hasHabits = (count($hab)>0?true:false);
        
        $internalHabit = null;
        
        if ($hasHabits) {
            foreach ($hab as $id => $h) {
                // DEBUGGING OUT RELATED FIELDS
                //echo "</BR>" . $id . "</BR>";
                //echo "id:" . $h->id;
                //echo " habitID/name: " . $h->getHabit->id . "/" . $h->getHabit->name;
                //echo " user:" . $h->getUserField->getUser->name;
                if ($h->getHabit->name == "_log") $internalHabit = $h;
            }
        }
        
        $data = array(
            'userField' => $userField,
            'hab' => $internalHabit);
        
        //echo "<pre>";
        //print_r($hab);
        //echo "</pre>";
        
        // /home aadressile suunatud Ajax request... Siin ei tohiks teha suurt?
        if(Request::ajax()){
            
            //return view('ajax.test', $data);
            return view('ajax.doti-habit-stat', $data);
        }
        return view('ajax.doti-habit-stat', $data);
        //return view('ajax.doti-habit-stat', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "hello@create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "hello@store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "hello@show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo "hello@edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo "hello@update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo "hello@Destroy";
    }
}
