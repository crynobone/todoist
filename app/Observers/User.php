<?php

namespace App\Observers;

use Orchestra\Tenanti\Observer;

class User extends Observer
{
    /**
     * Get driver name.
     *
     * @return string
     */
    public function getDriverName()
    {
        return 'user';
    }
}
