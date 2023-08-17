<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierEnv extends Model
{
    use HasFactory;
    protected $fillable = ['type_courr' ,'objet' ,'destination', 'source', 'titre', 'date', 'id_piece', 'id_service'];
    protected $table = 'courrier_envs';

    public  function pieceJointe(){
        return $this->belongsTo(PieceJointe::class, 'id_piece');
    }

    public  function service(){
        return $this->belongsTo(Service::class, 'id_service');
    }

    public  function archive_courrier_env(){
        return $this->hasMany(ArchiveCourrierEnv::class, 'id_courrE');
    }
    public  function type_courr(){
        return $this->hasMany(TypeCourrier::class, 'id_courrE');
    }
}
