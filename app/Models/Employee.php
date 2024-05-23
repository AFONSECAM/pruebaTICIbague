<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'address',
        'phone',
        'email',
        'identification_number',
        'department_id'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
