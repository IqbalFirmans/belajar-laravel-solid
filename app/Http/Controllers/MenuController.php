<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\MenuInterface;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class MenuController extends Controller
{

    use ResponseTrait;
    /**
     * Constructor.
     *
     * @param  App\Contracts\Interfaces\MenuInterface  $example
     * @return void
     */
    public function __construct(
        private MenuInterface $menu
    ){
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illminate\Http\JsonResponse
     */

    public function index()
    {
        $data = $this->menu->get();
        return $this->successResponse('Success get data', $data);
    }

    /**
     * Fungsi untuk menyimpan data baru ke dalam model Example.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MenuRequest $request)
    {
        try {
            $data = $this->menu->store($request->validated());
            return $this->successResponse('Success store data', $data);
        } catch(Exception $e)
        {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Fungsi untuk mengupdate data pada model Example berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MenuRequest $request, $id)
    {
        try {
            $data = $this->menu->update($id, $request->validated());
            return $this->successResponse('Success update data!', $data);
        } catch (\Throwable $e)
        {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Fungsi untuk menghapus data pada model Example berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $data = $this->menu->delete($id);
            return $this->successResponse('Success Delete data!', $data);
        } catch (\Throwable $e)
        {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
