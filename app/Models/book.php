<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = 'books';
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

    public static function createCode()
    {
        $latestCode = self::orderBy('book_code', 'desc')->value('book_code');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'B' . $formattedCodeNumber;
    }
}
