<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepository\Eloquent\EloquentBaseRepository;
use App\Repositories\Interfaces\SettingRepository;
use Illuminate\Support\Facades\DB;

class EloquentSettingRepository extends EloquentBaseRepository implements SettingRepository{
    public function __construct($models)
    {
        $this->model = $models;
    }

    public function getSetting(){
        $setting = $this->model->first();
        return $setting;
    }

    public function update_setting($data_update = [])
    {
        $setting = $this->getSetting();
        $update_data = $setting->fill($data_update)->save();

        return $update_data;
    }



}