<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $table = 'clicks';
    protected $primaryKey = 'id';

    public function create($data)
    {
        DB::table($this->table)->insert($data);
    }

}
