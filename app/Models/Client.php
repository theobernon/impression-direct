<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'prenom',
        'refClient',
        'codeTiers',
        'email',
        'societe',
        'typeClient',
        'fonction',
        'tel',
        'mobile',
        'fax',
        'factAdr1',
        'factAdr2',
        'factAdr3',
        'factPays',
        'livNom',
        'livAdr1',
        'livAdr2',
        'livAdr3',
        'livPays',
        'id_teleprospecteur'
    ];
}
