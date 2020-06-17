<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kits extends Model
{
    protected $table = 'kits';

    protected $fillable = [
        'fk_produto', 'quantidade', 'descricao'
    ];
}
