<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCourrier extends Model
{
    use HasFactory;

    protected $fillable = ['libelle_t','id_courrE','id_courrR'];
    protected $table = 'type_courriers';

    public  function courrierEnv(){
        return $this->belongsTo(CourrierEnv::class, 'id_courrE');
    }
    public  function courrierRecu(){
        return $this->belongsTo(CourrierRecu::class, 'id_courrR');
    }
}
