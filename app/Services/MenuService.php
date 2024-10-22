<?php
namespace App\Services;

use App\Models\Menu;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\MenuRequest;
use App\Contracts\Repositories\MenuRepository;
use App\Contracts\Interfaces\Uploads\CustomUploadValidation;
use App\Contracts\Interfaces\Uploads\ShouldHandleFileUpload;

class MenuService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

     /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param Request $request
     *
     * @return array|bool
     */

    public function store(Request $request): array|bool
    {

        return [
            'name' => $request['name'],
            'image' => $this->upload(UploadDiskEnum::IMAGES->value, $request->file('image'))
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param MenuRequest $request
     * @param Menu $menu
     * @return array|bool
     */

    public function update(MenuRequest $request, Menu $menu): array|bool
    {
        $validateData = $request->validated();

        $old_image = $menu->image;

        if ($request->hash_file('image')) {
            $this->remove($old_image);
            $old_image = $this->upload(UploadDiskEnum::IMAGES->value, $request->file('image'));
        }

        return [
            'name' => $validateData['name'],
            'image' => $old_image
        ];
    }

}
