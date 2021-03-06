<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contacts";
    protected $fillable = [
        'logo' ,
        'phone_1' , 'phone_2' , 'email' , 'timetable' ,
        'telegram' , 'youtube' , 'facebook' , 'instagram' ,
        'title_uz' , 'title_ru' , 'title_en'
    ];

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function first(){
        $address = $this->addresses()->first();
        return $address;
    }
}
