<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\MenuInterface;
use App\Traits\EloquentTrait;
use App\Models\Menu;
use App\Traits\UploadTrait;

class MenuRepository extends BaseRepository implements MenuInterface
{
    use EloquentTrait;
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }
}

