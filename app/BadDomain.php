<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class BadDomain extends Model
{
    //указываем таблицу
    protected $table = 'bad_domains';
    //указываем первичный ключ
    protected $primaryKey = 'id';

    public function create($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function edit($id, $data)
    {
        DB::table($this->table)->where('id', '=', $id)
            ->update($data);
    }

}
