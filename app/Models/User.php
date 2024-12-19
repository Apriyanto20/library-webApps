<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nim',
        'class_code',
        'address',
        'place_of_birth',
        'date_birth',
        'gender',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function loanTransaction()
    {
        return $this->hasMany(loan_transaction::class, 'id_user');
    }
    public function loan_transactions()
    {
        return $this->belongsTo(loan_transaction::class, 'id', 'id_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Classes::class, 'class_code', 'class_code');
    }

    public function fakultas()
    {
        return $this->belongsTo(Faculty::class, 'faculty_code', 'faculty_code');
    }
    public function major()
    {
        return $this->belongsTo(major::class, 'major_code', 'major_code');
    }
}
