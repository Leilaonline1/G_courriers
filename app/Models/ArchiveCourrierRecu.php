<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveCourrierRecu extends Model
{
    use HasFactory;
    protected $fillable = ['date_archivage'];
    protected $table = 'archive_courrier_recus';

    public  function courrier_recu(){
        return $this->belongsTo(CourrierRecu::class, 'id_courrR');
    }
}
