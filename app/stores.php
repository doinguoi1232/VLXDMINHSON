<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class stores extends Model {

    protected $table='stores';
    protected $fillable=['soluong','userd_id','products_id'];
    public function products(){
        return $this->hasmany('App\products');
    }


}
