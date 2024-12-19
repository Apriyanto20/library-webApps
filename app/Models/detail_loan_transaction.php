<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_loan_transaction extends Model
{
    protected $table = 'detail_loan_transaction';
    protected $fillable = [
        'id',
        'id_loan',
        'id_book',
        'id_package',
        'return_status',
        'receipt_date',
        'monetary_fine',
    ];
    public function loanTransaction()
    {
        return $this->belongsTo(loan_transaction::class, 'id_loan', 'loan_code');
    }
    public function loanPackage()
    {
        return $this->belongsTo(LoanPackages::class, 'id_package', 'package_code');
    }
    public function book()
    {
        return $this->belongsTo(book::class, 'id_book', 'book_code');
    }
}
