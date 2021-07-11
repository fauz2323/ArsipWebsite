<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the codeArsip that owns the ArsipPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function codeArsip()
    {
        return $this->belongsTo(CodeArsip::class, 'code_id', 'id');
    }

    /**
     * Get all of the files for the ArsipPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'arsip_id', 'id');
    }
}
