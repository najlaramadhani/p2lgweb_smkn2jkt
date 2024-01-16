<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Departement::class, 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id');
    }

    public function status()
    {
        return $this->belongsTo(EmployeeStatus::class, 'id');
    }
}
