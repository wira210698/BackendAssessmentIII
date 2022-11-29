<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepository\Eloquent\EloquentBaseRepository;
use App\Repositories\Interfaces\EmployeeRepository;
use Illuminate\Support\Facades\DB;

class EloquentEmployeeRepository extends EloquentBaseRepository implements EmployeeRepository{
    public function __construct($models)
    {
        $this->model = $models;
    }

    public function getEmployee()
    {
        $employee = $this->model->get();

        return $employee;
    }



}