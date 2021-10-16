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
}
