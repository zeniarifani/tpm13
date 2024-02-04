<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(Team::class, 'user_id');
    }
    protected $fillable = [
        'name','password','binusian','leader_name','email_leader','whatsapp_leader','line','github','birthdate','birthplace','cv','id_card'
    ];
}
