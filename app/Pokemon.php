<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{

    public $timestamps = false;
    protected $fillable =  [
        'name','level', 'userid', 'sprite'
    ];


    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $sprite
     */
    public function setSprite($sprite)
    {
        $this->sprite = $sprite;
    }



    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param bool $unguarded
     */
    public static function setUnguarded(bool $unguarded)
    {
        self::$unguarded = $unguarded;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param array $guarded
     */
    public function setGuarded(array $guarded)
    {
        $this->guarded = $guarded;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSprite()
    {
        return $this->sprite;
    }

    public function User(){
           return $this->belongsTo('App\User');
    }

}
