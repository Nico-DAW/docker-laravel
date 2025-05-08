<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    //
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    
    // Trabajando aquí... 
    protected $fillable = [
        'cliente_id',
        'marca',
        'modelo',
        'matricula',
        'fecha',
        'hora',
        'duracion',
    ];

    public static function rules($userId = null)
    {
        return [
            'cliente_id' => 'required|exists:users,id',
        ];
    }

    /**
     * Relación: una cita pertenece a un usuario (cliente).
    */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

}
