<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->EmployeeRepo = app(EmployeeRepository::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data_insert = $request->all();
        $this->validate($request, [
            'name' => 'required|unique:employees',
        ]);

        DB::beginTransaction();
        try {
            $this->EmployeeRepo->create($data_insert);
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

}
