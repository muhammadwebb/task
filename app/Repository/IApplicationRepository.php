<?php

namespace App\Repository;

use App\Models\Application;
use Illuminate\Pagination\LengthAwarePaginator;

interface IApplicationRepository
{
    public function list() : LengthAwarePaginator;
    public function findById($id) : Application;
    public function storeOrUpdate( $id = null, $collection = [] );
    public function destroyById($object);
}
