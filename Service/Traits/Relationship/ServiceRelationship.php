<?php

namespace App\Models\Service\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\User;

/**
 * Class UserRelationship.
 */
trait ServiceRelationship
{

    /**
     * @return mixed
     */
    public function serviecHistory()
    {
        return $this->hasMany(User::class);
    }
}
