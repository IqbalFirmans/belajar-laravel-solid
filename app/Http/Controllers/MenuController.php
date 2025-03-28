<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Traits\ResponseTrait;
use App\Http\Requests\MenuRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\MenuInterface;

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

    public function index()
    {
        $data = $this->menu->get();

        return view('menu.index', compact('data'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function store(MenuRequest $request)
    {
        $store = $this->service->store($request);

        $this->menu->store($store);

        return to_route('menu.index')->with('success', 'Create menu Success!');
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $update = $this->service->update($request, $menu);

        $this->menu->update($menu->id, $update);

        return to_route('menu.index')->with('success', 'Update data berhasil!');
    }

    public function destroy(Menu $menu)
    {
        $this->menu->delete($menu->id);

        $this->service->remove($menu->image);

        return to_route('menu.index')->with('success', 'Delete menu Success!');
    }

}
