<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded =[];

    public function mark(){
        $this->iscomplete =$this->iscomplete ? false : true;
        $this->save();
    }
}
