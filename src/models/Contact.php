<?php

namespace golpik\contact\models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_inquiries';

    protected $fillable = ['name', 'email', 'subject', 'message', 'phone'];
    
}
