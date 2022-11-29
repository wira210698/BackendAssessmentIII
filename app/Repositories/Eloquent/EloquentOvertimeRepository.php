<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\BaseRepository\Eloquent\EloquentBaseRepository;
use App\Repositories\Interfaces\OvertimeRepository;
use App\Transformers\OvertimeEmployeeTransformers;
use Illuminate\Support\Facades\DB;

class EloquentOvertimeRepository extends EloquentBaseRepository implements OvertimeRepository{
    public function __construct($models)
    {
        $this->model = $models;
    }

    public function getDataEmployees($date = null, $employee,$setting)
    {
        $data = OvertimeEmployeeTransformers::collection($employee);
        return $data;
    }



}