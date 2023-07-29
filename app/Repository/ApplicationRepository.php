<?php

namespace App\Repository;

use App\Models\Application;
use Illuminate\Pagination\LengthAwarePaginator;

class ApplicationRepository implements IApplicationRepository
{

    public function list(): LengthAwarePaginator
    {
        // TODO: Implement list() method.
    }

    public function findById($id): Application
    {
        // TODO: Implement findById() method.
    }

    public function storeOrUpdate($id = null, $collection = [])
    {
        // TODO: Implement storeOrUpdate() method.
    }

    public function destroyById($object)
    {
        // TODO: Implement destroyById() method.
    }
}
