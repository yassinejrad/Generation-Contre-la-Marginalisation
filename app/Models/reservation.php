<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    public function livre(){
        return $this->belongsTo(livre::class);
    }
    protected $fillable = [
        'date_debut',
        'date_fin',
        'etat',
        'livre_id'
    ];
}
