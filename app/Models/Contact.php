<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone'];

    public function setPhoneAttribute($value)
    {
        if (!str_starts_with($value, '+90')) {
            $value = '+90 ' . $value;
        }
        
        $this->attributes['phone'] = $value;
    }

    public function getPhoneAttribute($value)
    {
        return str_starts_with($value, '+90') ? substr($value, 4) : $value;
    }

}
