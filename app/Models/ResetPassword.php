<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    use HasFactory;

    protected $table = 'reset_passwords';
    public $timestamps = true;
    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
          'userId','type', 'code', "status",'created_at',

    ];
}
