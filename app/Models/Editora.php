<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $table = 'editoras';
    protected $primaryKey = 'id_editora';
    protected $fillable = ['nome'];

    // Relações, se necessário
}
