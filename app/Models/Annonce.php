<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = ['ref_annonce', 'prix_annonce', 'surface_habitable', 'nombre_de_piece', 'agent_id'];

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
