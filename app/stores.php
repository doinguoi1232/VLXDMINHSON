<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class stores extends Model {

	protected $table='stores';
    protected $fillable=['name','description'];
    public function products(){
        return $this->hasmany('App\products');
    }


}
