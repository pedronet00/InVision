<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['taskName', 'G', 'U', 'T', 'Total', 'project'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project'); // 'project' é o nome da coluna que faz a ligação
    }
}
