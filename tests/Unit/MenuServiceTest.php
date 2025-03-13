<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Menu;
use App\Enums\UploadDiskEnum;
use App\Services\MenuService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuServiceTest extends TestCase
{

    protected MenuService $menuService;

    // tests/Unit/MenuServiceTest.php
    public function setUp(): void
    {
        parent::setUp();
        $this->menuService = new MenuService();

        Storage::fake('images');
    }

    public function test_store_menu_with_image_upload()
    {
        Storage::fake(UploadDiskEnum::IMAGES->value);

        $file = UploadedFile::fake()->image('menu.jpg');

        $request = \Illuminate\Http\Request::create('/', 'POST', [
            'name' => 'New Menu Item',
        ], files: ['image' => $file]);

        $storedData = $this->menuService->store($request);

        $this->assertEquals('New Menu Item', $storedData['name']);
        $this->assertNotNull($storedData['image'], "Gagal upload, 'image' bernilai null");

        Storage::disk(UploadDiskEnum::IMAGES->value)->assertExists($storedData['image']);
    }

    public function test_update_menu_with_image_upload()
    {
        // Simulasi file upload dan menu awal
        Storage::fake('images');
        $oldFile = UploadedFile::fake()->image('old_menu.jpg');
        $menu = Menu::factory()->create([
            'name' => 'Old Menu',
            'image' => $oldFile->store('images', 'public'),
        ]);

        // Data baru yang akan diupdate
        $newFile = UploadedFile::fake()->image('new_menu.jpg');
        $updateData = [
            'name' => 'Updated Menu',
            'image' => $newFile,
        ];

        // Panggil method update
        $updatedData = $this->menuService->update($updateData, $menu);

        // Verifikasi bahwa nama dan gambar terupdate
        $this->assertEquals('Updated Menu', $updatedData['name']);
        $this->assertNotNull($updatedData['image']);

        // Cek apakah file gambar lama dihapus dan gambar baru tersimpan
        Storage::disk('images')->assertMissing($menu->image);
        Storage::disk('images')->assertExists($updatedData['image']);
    }
}
