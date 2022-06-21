<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abstract',
        'volume',
        'number',
        'publish_date',
        'doc_path',
        'keywords',
        'created_at',
        'updated_at',
    ];
}
