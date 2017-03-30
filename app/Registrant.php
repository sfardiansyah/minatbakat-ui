<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    protected $fillable = ['name', 'username', 'name', 'npm', 'faculty', 'study_program', 
      'educational_program', 'competition_id'];
}
