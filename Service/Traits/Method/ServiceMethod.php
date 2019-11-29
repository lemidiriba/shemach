<?php

namespace App\Models\Service\Traits\Method;

use App\Models\Service\Service;
/** 
 * Trait UserMethod.
 */
trait ServiceMethod
{

    public function __constructor(Service $model)
    {
        $this->model = $model;
    }
    /**
     * @param int $service_id
     * @return bool 
     */
    public function addServeiceToRoom($service_id)
    {
        
    }


    /**
     * @param int $service_id
     * @return bool 
     */
    public function removeServeiceFromRoom($service_id)
    {

    }


     /**
     * @return mixed
     */
    public function addService()
    {

    }

     public function listService()
     {
         
     }

}