<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OvertimeTransformers extends JsonResource
{
    public function toArray($request)
    {    
        return [
            'id' => $this->id,
            'date' => $this->date,
            'time_started' => $this->time_started,
            'time_ended' => $this->time_ended,
            'overtime_duration' => '',
        ];
    }
}