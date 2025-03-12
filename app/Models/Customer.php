<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Tên bảng
    protected $primaryKey = 'customer_id'; // Khóa chính
    public $incrementing = false; // Không tự động tăng
    protected $keyType = 'bigInteger'; // Kiểu dữ liệu của khóa chính

    protected $fillable = ['customer_id', 'name', 'email', 'phone'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }
}
