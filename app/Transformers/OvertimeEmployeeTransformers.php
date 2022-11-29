<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OvertimeEmployeeTransformers extends JsonResource
{

    public function toArray($request)
    {  
        return [
            'id' => $this->id,
            'name' => $this->name,
            'salary' => $this->salary,
            'overtime' => OvertimeTransformers::collection($this->overtime),
            'overtime_duration_total'=>'',
            'amount'=> $this->setting
        ];
    }
}