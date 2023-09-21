<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description'
    ];

    public function moneyRecords()
    {
        return $this->hasMany(MoneyRecord::class);
    }
}
