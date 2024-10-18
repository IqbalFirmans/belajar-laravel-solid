<?php
namespace App\Contracts\Interfaces\Eloquents;

/**
 * Interface StoreInterface
 *
 * Interface ini digunakan untuk mendefinisikan method store() yang akan
 * digunakan untuk menyimpan data ke dalam sebuah model.
 *
 * @package App\Contracts\Interfaces\Eloquents
 */

interface StoreInterface
{
    /**
     * method store() digunakan untuk menyimpan data ke dalam sebuah model.
     *
     * @param array $data Data yang akan disimpan
     * @return mixed Hasil dari method store(), biasanya interface dari model yang akan dibuat atau updated.
     */

     public function store(array $data): mixed;
}


