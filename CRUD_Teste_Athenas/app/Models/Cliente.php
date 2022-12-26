<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = "clientes";

    protected $fillable = ['name', 'last_name', 'gender','adress','date_birth'];


}
