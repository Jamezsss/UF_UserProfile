<?php

/*
 * UF Custom User Profile Field Sprinkle
 *
 * @link https://github.com/lcharette/UF_UserProfile
 * @copyright Copyright (c) 2017 Louis Charette
 * @license https://github.com/lcharette/UF_UserProfile/blob/master/LICENSE (MIT License)
 */

namespace UserFrosting\Sprinkle\UserProfile\Database\Models;

use UserFrosting\Sprinkle\Account\Database\Models\User as CoreUser;
use UserFrosting\Sprinkle\UserProfile\Database\Models\Traits\ProfileFieldsHelpers;

/**
 * User Class.
 *
 * Extend the core User Model to add the custom user profile fields
 *
 * @extend CoreUser
 *
 * @author Louis Charette
 */
class User extends CoreUser
{
    use ProfileFieldsHelpers;

    /**
     * Eloquent relation to the profile table.
     */
    public function profileFields()
    {
        return $this->morphMany('\UserFrosting\Sprinkle\UserProfile\Database\Models\ProfileFields', 'parent');
    }

    /**
     * Delete the profileFields values when deleting the main model.
     *
     * @param bool $hardDelete (default: false)
     *
     * @return void
     */
    public function delete($hardDelete = false)
    {
        if ($hardDelete) {
            $this->profileFields()->delete();
        }
        parent::delete($hardDelete);
    }
}
