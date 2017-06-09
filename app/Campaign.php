<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	protected $primaryKey = 'campaigns_id';
    public $fillable = ['campaigns_id','title','detail','product_url','minprice','maxprice','productimg','deadline','user_id','create_at','status','updated_at'];
 
}