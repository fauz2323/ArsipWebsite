<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileMurid extends Model
{
    protected $guarded = [];

    /**
     * Get the murid that owns the FileMurid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'id');
    }
}
