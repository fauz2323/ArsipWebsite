<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeArsip extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the arsip fdeArsip
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arsip()
    {
        return $this->hasMany(ArsipPost::class, 'code_id', 'id');
    }

}
