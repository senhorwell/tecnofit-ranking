<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Record extends Model {
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personal_record';

    /**
     * The database primary key value.
     *
     * @var string
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'movement_id',
        'value',
        'date'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function movimento()
    {
        return $this->belongsTo(Movement::class, 'movement_id');
    }
}
