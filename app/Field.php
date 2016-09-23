<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function markClicked() {
        $this->clicked = $this->clicked ? false : true;
        $this->save();
    }
    
    /**
     * Method for calling users linked to self.
     *
     */
    //public function getLinkedUsers() {
    //    return $this->belongsToMany('App\User');
    //}
    
    /**
     * Method for calling users linked to self.
     *
     */
    public function getLinkedUserFields() {
        return $this->belongsToMany('App\UserField');
    }
    
    /**
     * Method for calling habits linked to self.
     *
     */
    //public function getLinkedHabits() {
    //    return $this->belongsToMany('App\Habit');
    //}
}
