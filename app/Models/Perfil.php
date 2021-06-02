<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public static function array(){
        $perfil=Perfil::orderBy('nombre')->get();
        $array=[];
        foreach($perfil as $item){
            $array[$item->id]=$item->nombre;
        }
        return $array;
    }

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }
}
