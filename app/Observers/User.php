<?php

namespace App\Observers;

use Orchestra\Tenanti\Observer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Run on created observer.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $entity
     *
     * @return bool
     */
    public function created(Model $entity)
    {
        $this->createDatabase($entity);

        parent::created($entity);
    }

    /**
     * Create database for entity.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $entity
     *
     * @return mixed
     */
    protected function createDatabase(Model $entity)
    {
        return $entity->getConnection()->unprepared("CREATE DATABASE `todoist_{$entity->getKey()}`");
    }
}
