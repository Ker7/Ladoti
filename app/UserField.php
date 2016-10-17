<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserField extends Model
{
        
    /**
     * The table associated with the model. Snake case - plural name for table is assumes.
     * So in this case it is not important whether we do declare this table or not.
     *
     * @var string
     */
    protected $table = 'field_user';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clicked', 'active', 'public',
    ];
    
    protected $user;    
    protected $field;
    
    public function __construct(){
        //$this->user = $this->getUser;
        //$this->field = $this->getField;
    }
    
    /**
     * Get the Field model of this User-Field boundation
     */
    public function getField()
    {
        return $this->hasOne('App\Field', 'id', 'field_id');
    }
    /**
     * Get the Field model of this User-Field boundation
     */
    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function getHabits()
    {
        return $this->hasMany('App\FHabits', 'userfield_id', 'id');
    }
    
    // Testfunktsioon. @todo eemaldada
    public function toggleClicked() {
        $this->clicked = $this->clicked ? false : true;
        $this->save();
    }
    
    /* Toggle whether this Field is shown to others or not.
     * This is general default, which is used for Habits as well
     */
    public function toggleActive() {
        $this->active = $this->active ? false : true;
        $this->save();
    }
    public function togglePublic() {
        $this->public = $this->public ? false : true;
        $this->save();
    }
}
