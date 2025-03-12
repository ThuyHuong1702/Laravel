<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    protected $keyType = 'bigInteger';

    protected $fillable = ['employee_id', 'name', 'start_date'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }
}
