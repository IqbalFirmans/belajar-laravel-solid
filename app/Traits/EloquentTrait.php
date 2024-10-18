<?php

namespace App\Traits;

trait EloquentTrait
{
    /**
     * method get() digunakan untuk mengambil data dari sebuah model.
     *
     * @param int|string|null $id ID dari model.
     * @return \Illuminate\Database\Eloquent\Model|Collection|\Illuminate\Support\Collection
     */
    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    /**
     * method show() digunakan untuk mendapatkan model berdasarkan ID atau kunci
     *
     * @param int|string $id ID atau kunci yang digunakan untuk mendapatkan model.
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function show(int|string $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    /**
     * method store() digunakan untuk menyimpan data ke dalam sebuah model.
     *
     * @param array $data Data yang akan disimpan
     * @return \Illuminate\Database\Modelw
     */
    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * method update() digunakan untuk mengupdate data dari sebuah model berdasarkan ID atau kunci.
     *
     * @param int|string $id ID atau kunci yang akan digunakan untuk mengupdate model
     * @param array      $data Data yang akan di update
     * @return \Illuminate\Database\Eloquent\Model|bool
     */
    public function update(int|string $id, array $data): mixed
    {
        $model = $this->model->findOrFail($id);
        return $model->update($data);
    }

    /**
     * method delete() digunakan untuk menghapus data dari sebuah model berdasarkan ID atau kunci
     *
     * @param int|string $id ID atau kunci yang akan digunakan untuk menghapus model
     * @return bool
     */
    public function delete(int|string $id): mixed
    {
        return $this->model->findOrFail($id)->delete();
    }
}
