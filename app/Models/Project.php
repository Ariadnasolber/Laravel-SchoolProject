<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ¡Falta esta línea!
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; // Usa el trait HasFactory

    // Campos rellenables
    protected $fillable = ['name', 'description', 'deadline', 'user_id'];

    // Relación con el modelo User
    public function user()
    {
        // Un proyecto pertenece a un usuario
        return $this->belongsTo(User::class); // Relación de uno a muchos
    }
}
