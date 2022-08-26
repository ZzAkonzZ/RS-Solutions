<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'address',
        'post_index',
        'company_phone',
        'email',
        'bin',
        'iik',
        'bank_name',
        'bik',
        'ceo_name',
        'responsible_person',
        'responsible_person_phone',
        'responsible_person_email',
        'domen',
        'certificate',
    ];
}
