<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interviewerModel extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'addinterviewerid';
    protected $table = 'addinterviewer';
    protected $fillable = array(
        'employeeName',
        'intervieweremail',
        'intervieweremailpass',
        'monday',
        'tuesday',
        'wednesday',
        'thrusday',
        'friday',
        'saturday',
        'sunday',
        'main',
        'add_interview_token',
        'available_status'
);
    public $timestamps = false;
}
