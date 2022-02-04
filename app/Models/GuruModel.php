<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fileGuru()
    {
        return $this->hasMany(FileGuru::class, 'guru_id', 'id');
    }

    /**
     * Get the user that owns the GuruModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_akun', 'id');
    }

    public function codeArsip()
    {
        return $this->belongsTo(CodeArsip::class, 'code_id', 'id');
    }
}
