<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_name',
        'bank_code',
        'branch_name',
        'branch_code',
        'swift_code',
        'account_number',
        'name',
        'account_type',
    ];
}
