<?php

namespace App\Models;



use App\Helpers\API\BreweriesApiClient;
use Jenssegers\Model\Model;

class Brewery extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden =['city'];

   public function getAddressAttribute(){
       return $this->state." ".$this->city. " ".$this->street." ".$this->postalCode;
   }
   public function toArray()
   {
       return [
           'id'=>$this->id,
           'adress'=> $this->getAddressAttribute()
       ];
   }
    // TODO Add exceptions
   public static function findByApi(BreweriesApiClient $apiClient, $id){
       $res = $apiClient->sendRequest('GET', 'breweries/'.$id);
       return new self($res['body']);
   }
}
