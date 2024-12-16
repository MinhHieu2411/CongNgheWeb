<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['computer_id', 'reported_by', 'reported_date', 'description', 'urgency', 'status'];

    //
    public function Computer(){
        return $this->belongsTo(Computer::class);
    }
}
