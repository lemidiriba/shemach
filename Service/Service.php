<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

use App\Models\Service\Traits\Relationship\ServiceRelationship;
use App\Models\Service\Traits\Method\ServiceMethod;
use App\Models\Service\Traits\Attribute\ServiceAttribute;


/**
*Class Service
 */

class Service
{
    use ServiceAttribute,
        ServiceMethod,
        ServiceRelationShip;


}
