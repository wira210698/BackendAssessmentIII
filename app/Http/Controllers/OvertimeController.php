<?php

namespace App\Http\Controllers;

use App\Http\Requests\OvertimeRequest;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\OvertimeRepository;
use App\Repositories\Interfaces\SettingRepository;
use App\Transformers\OvertimeEmployeeTransformers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OvertimeController extends Controller
{

    public function __construct()
    {
        $this->OvertimeRepo = app(OvertimeRepository::class);
        $this->EmployeeRepo = app(EmployeeRepository::class);
        $this->SettingRepo = app(SettingRepository::class);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OvertimeRequest $request)
    {
        $data_insert = $request->all();
        DB::beginTransaction();
        try {
            $this->OvertimeRepo->create($data_insert);
        DB::commit();
        } catch (\Throwable $th) {
        DB::rollBack();
            return response()->json([
                'errors' => true,
                'message' => $th->getMessage(),
            ]);
        }

        return response()->json([
            'errors' => false,
            'message' => "Berhasil",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    //    $month = $request->mounth;
       $month = date('Y-M');
        // $getEmployee = $this->EmployeeRepo->getEmployee();
        $getEmployee = $this->EmployeeRepo->getEmployee();
        $getSetting = $this->SettingRepo->getSetting();
        $getDataEmployees =  $this->OvertimeRepo->getDataEmployees($month,$getEmployee, $getSetting);
        return $getDataEmployees ;
    }

}
