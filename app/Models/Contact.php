<?php

namespace App\Models;

use App\Traits\Relation;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use Uuids;
    use SoftDeletes;
    use HasFactory;
    use Relation;

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }
}
