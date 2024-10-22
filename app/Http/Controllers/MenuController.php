<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Traits\ResponseTrait;
use App\Http\Requests\MenuRequest;
use App\Contracts\Interfaces\MenuInterface;
use Illuminate\Support\Facades\Validator;



class MenuController extends Controller
{

    use ResponseTrait;

    private MenuInterface $menu;
    private MenuService $service;
    /**
     * Constructor.
     *
     * @param  App\Contracts\Interfaces\MenuInterface  $example
     * @return void
     */
    public function __construct(MenuInterface $menu, MenuService $service)
    {
        $this->menu = $menu;
        $this->service = $service;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:5000',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', 422, $validator->errors());
        }

        try {
            $store = $this->service->store($request);

            $this->menu->store($store);

            return $this->successResponse('Success store data', $store);
        } catch (Exception $e) {
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
        } catch (\Throwable $e) {
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
        $menu = $this->menu->find($id);

        try {
            $data = $this->menu->delete($id);

            $this->service->remove($menu->image);

            return $this->successResponse('Success Delete data!', $data);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
