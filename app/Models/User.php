<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';
    public $timestamps = false;

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function records()
    {
        return $this->hasMany(Record::class, 'user_id');
    }
}
