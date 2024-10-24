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

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }


    public function update(MenuRequest $request, Menu $menu)
    {
        $update = $this->service->update($request, $menu);

        $this->menu->update($menu->id, $update);

        return to_route('menus.edit', request('menu'))->with('success', 'Update data berhasil!');
    }
}
