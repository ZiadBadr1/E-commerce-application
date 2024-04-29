<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'avatar'];

    public function avatar():string
    {
        return  $this->avatar ? asset($this->avatar) : asset('admin/img/boy.png');
    }
}
