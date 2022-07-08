<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProdutoEntity extends Entity
{
    protected $attributes = [
        'ativo' => 's'
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
