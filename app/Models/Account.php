<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use Uuids;//trait to genereate uuid for the id field
    use SoftDeletes;
    use HasFactory;


    //protected $primaryKey = 'account_id';
    protected $fillable = [
        //'account_id',
        'name',
        'dob',
        'phone',
        'email',
        'address',
        'gender',
        'country',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

}

