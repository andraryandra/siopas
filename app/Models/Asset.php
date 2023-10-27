<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'assets', $guarded = ['id'];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
