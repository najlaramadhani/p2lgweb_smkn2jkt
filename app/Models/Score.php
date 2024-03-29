<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
