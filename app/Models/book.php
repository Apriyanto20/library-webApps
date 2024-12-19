<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = 'book';
    protected $fillable = [
        'book_code',
        'tittle',
        'author',
        'publisher',
        'place_of_publicaton',
        'publication_year',
        'faculty_code',
        'genre_code',
        'source_code',
        'bookshelf',
        'synopsis',
        'ebook',
        'cover',
        'books_status',
    ];

    public function detailLoan()
    {
        return $this->hasMany(detail_loan_transaction::class, 'book_code');
    }

    public function fakultas()
    {
        return $this->belongsTo(Faculty::class, 'faculty_code', 'faculty_code');
    }
    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre_code', 'genre_code');
    }
    public function sources()
    {
        return $this->belongsTo(sources::class, 'source_code', 'source_code');
    }
}
