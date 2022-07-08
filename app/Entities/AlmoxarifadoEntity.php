<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class AlmoxarifadoEntity extends Entity
{
    protected $attributes = [
        'ativo' => 's'
    ];    
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
