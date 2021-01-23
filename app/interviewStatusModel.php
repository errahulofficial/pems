<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interviewStatusModel extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'interviewstatusid';
    protected $table = 'interviewstatus';
    protected $fillable = array(
        'name',
        'colorcode',
        'jobPositionId',
        'jobPositionStepid',
        'jobPositionStepName',
        'emailSubject',
        'EmailFromAddress',
        'EmailFromAddressPass',
        'EmailFromName',
        'variables',
        'HTMLMessage',
        'TextMessage'
    );

    public function getFullNameAttribute()
    {
        return $this->jobPositionStepName . ' - ' . $this->name;
    }
}
