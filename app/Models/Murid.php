<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $guarded = [];

    /**
     * Get all of the filesMurid for the Murid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filesMurid()
    {
        return $this->hasMany(FileMurid::class, 'murid_id', 'id');
    }
}
