<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Repositories\Interfaces\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->SettingRepo = app(SettingRepository::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        $data_update = $request->all();
        DB::beginTransaction();
        try {
            $this->SettingRepo->update_setting($data_update);
            return response()->json([
                'errors' => false,
                'message' => "Berhasil",
            ]);
        DB::commit();
        } catch (\Throwable $th) {
        DB::rollBack();
            return response()->json([
                'errors' => true,
                'message' => $th->getMessage(),
            ],500);
        }


    }

}
