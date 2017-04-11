<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['title','description','status','start_date','end_date','group_id','owner_id','featured_img'];    
}