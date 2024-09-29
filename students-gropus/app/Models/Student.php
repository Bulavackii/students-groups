<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group; 

class Student extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'name',
        'surname',
        
    ];

    /**
     * Связь "многие к одному" с моделью Group.
     */
    public function group() {
        return $this->belongsTo(Group::class);
    }
}
