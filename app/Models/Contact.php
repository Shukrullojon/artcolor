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
        'title_uz' , 'title_ru' , 'title_en' , 'address_1_uz' ,
        'address_1_ru' , 'address_1_en' , 'address_2_uz' , 'address_2_ru' ,
        'address_2_en' , 'address_3_uz' , 'address_3_ru' , 'address_3_en' ,
    ];

    public function address(){
        return $this->hasOne(Address::class);
    }
}
