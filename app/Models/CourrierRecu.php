<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierRecu extends Model
{
    use HasFactory;
    protected $fillable = ['type_courr' ,'titre','objet' ,'source','destination', 'date','etat', 'id_piece', 'id_service'];
    protected $table = 'courrier_recus';

    public  function pieceJointe(){
        return $this->belongsTo(PieceJointe::class, 'id_piece');
    }

    public  function service(){
        return $this->belongsTo(Service::class, 'id_service');
    }

    public  function archive_courrier_recu(){
        return $this->hasMany(ArchiveCourrierRecu::class, 'id_courrR');
    }

    public  function type_courr(){
        return $this->hasMany(TypeCourrier::class, 'id_courrR');
    }
}

