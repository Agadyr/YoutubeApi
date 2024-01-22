<?php

namespace App\Models;

use App\Traits\WithRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Arr;

class Model extends BaseModel
{
    use HasFactory;

    use WithRelationships;
}
