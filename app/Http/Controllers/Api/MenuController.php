<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
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

    public function show(Menu $menu)
    {
        $data = $menu;

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
     * @param  Menu  $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        try {
            $update = $this->service->update($request, $menu);

            $this->menu->update($menu->id, $update);

            return $this->successResponse('Success update data!', $update);
        }
        catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Fungsi untuk menghapus data pada model Example berdasarkan ID.
     *
     * @param  Model $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Menu $menu)
    {
        try {
            $data = $this->menu->delete($menu->id);

            $this->service->remove($menu->image);

            return $this->successResponse('Success Delete data!', $data);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
