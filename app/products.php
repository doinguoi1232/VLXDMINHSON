<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model {

	protected $table ='products';

    protected $fillable=['id','name','alias','price','keyword','soluong','quycach','dovitinh','ghichu','description' ,'category_id','providers_id','accede','userd_id','description'];
    public $timetamps=true;
}
