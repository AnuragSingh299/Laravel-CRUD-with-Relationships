<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Traits\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use Uuids, SoftDeletes, HasFactory, Relation;

    protected $fillable = [
        'name',
        'type',
        'duration',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }

    public function account()
    {
        return $this->belongsToMany(Account::class);
    }
}
