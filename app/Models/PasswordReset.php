<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id pk
 * @property string $email Email
 * @property string $token
 * @property Carbon $created_at
 */
class PasswordReset extends Model
{
    protected $fillable = [
        'id',
        'email',
        'token',
        'created_at'
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * @inheritdoc
     */
    protected $table = 'password_resets';
}
