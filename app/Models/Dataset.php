<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'text',
        'embedding',
    ];

    public function casts(): array
    {
        return [
            'embedding' => 'array',
        ];
    }
}
