<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'password',
        'name',
        'address',
        'email',
        'role',
        'created_at',
        'upodated_at',
    ];

    const ROLE_ADMIN          = 1;
    const ROLE_CUSTOMER       = 2;
    const ROLE_ADMIN_NAME     = 'admin';
    const ROLE_ADMIN_CUSTOMER = 'customer';

    const ENABLE_CUSTOMER = 1;
    const DISABLE_CUSTOMER = 0;

    public static $CUSTOMER = [
        self::ROLE_ADMIN => self::ROLE_ADMIN_NAME,
        self::ROLE_CUSTOMER => self::ROLE_ADMIN_CUSTOMER,
    ];

    public static $STATUS = [
        self::DISABLE_CUSTOMER => 'disable',
        self::ENABLE_CUSTOMER => 'enable'
    ];

    public function scopeGetId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE_CUSTOMER);
    }

    public function scopeFindEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeSortUpdate($query)
    {
        return $query->orderBy('alter_date', 'DESC');
    }

    public function scopeUpdatePassword($query, $attrubite)
    {
        return $query->update($attrubite);
    }

    public function scopeDifferentId($query, $id)
    {
        return $query->where('id', '<>', $id);
    }

    public function scopeSearch($query, $searchTerm) {
        return $query
            ->where('email', 'like', "%" . $searchTerm . "%")
            ->orWhere('name', 'like', "%" . $searchTerm . "%")
            ->orWhere('address', 'like', "%" . $searchTerm . "%");
    }
}
