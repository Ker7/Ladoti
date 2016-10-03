<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FHabits extends Model
{
    protected $table = 'userfield_habit';
    
    //public function getHabit(){
    //    return $this->belongsToMany
    //}
    
    /**
     * Get the Field model of this User-Field boundation
     */
    public function getUserField()
    {
        return $this->hasOne('App\UserField', 'id', 'userfield_id');
    }
    /**
     * Get the Field model of this User-Field boundation
     */
    public function getHabit()
    {
        return $this->hasOne('App\Habit', 'id', 'habit_id');
    }
}
