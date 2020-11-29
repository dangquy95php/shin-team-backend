<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table   = "contacts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'address',
        'email',
        'note',
        'created_at',
        'updated_at',
    ];

    public function scopeSearch($query, $searchTerm) {
        return $query
            ->where('email', 'like', "%" . $searchTerm . "%")
            ->orWhere('name', 'like', "%" . $searchTerm . "%")
            ->orWhere('address', 'like', "%" . $searchTerm . "%")
            ->orWhere('note', 'like', "%" . $searchTerm . "%");
    }
}