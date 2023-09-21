<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneyRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'in_category_id', 'out_category_id', 'record_no', 'brief', 'amount', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inCategory()
    {
        return $this->belongsTo(InCategory::class);
    }

    public function outCategory()
    {
        return $this->belongsTo(OutCategory::class);
    }
}
