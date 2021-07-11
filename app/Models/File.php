<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the arsip that owns the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arsip()
    {
        return $this->belongsTo(ArsipPost::class, 'arsip_id', 'id');
    }
}
