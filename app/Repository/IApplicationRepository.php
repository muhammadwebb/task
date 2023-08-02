<?php

namespace App\Repository;

use App\Models\Application;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface IApplicationRepository
{
    public function list() : LengthAwarePaginator;
    public function findById($id) : User;
    public function storeOrUpdate( $id = null, $collection = [] );
    public function destroyById($object);
}
