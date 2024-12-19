<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan_transaction extends Model
{
    protected $table = 'loan_transaction';
    protected $fillable = [
        'id',
        'loan_code',
        'id_user',
        'loan_date',
        'return_date',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function detail_loan()
    {
        return $this->hasMany(detail_loan_transaction::class, 'code_loan');
    }
}
