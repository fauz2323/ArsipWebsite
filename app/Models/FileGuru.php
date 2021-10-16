<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileGuru extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function murid()
    {
        return $this->belongsTo(GuruModel::class, 'guru_id', 'id');
    }
}
