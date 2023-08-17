<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveCourrierEnv extends Model
{
    use HasFactory;
    protected $fillable = ['date_archivage','id_courrE'];
    protected $table = 'archive_courrier_envs';

    public  function courrierEnv(){
        return $this->belongsTo(CourrierEnv::class, 'id_courrE');
    }
}
