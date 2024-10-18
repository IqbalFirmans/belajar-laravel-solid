<?php
namespace App\Contracts\Interfaces\Eloquents;

/**
 * Interface UpdateInterface
 *
 * Interface ini digunakan untuk mendifinisikan method update() yang akan
 * digunakan untuk mengakses dari sebuah model berdasarkan ID atau Kata Kunci.
 *
 * @package App\Contracts\Interfaces\Eloquents
 */

interface UpdateInterface
{
    /**
     * Method update digunakan untuk mengupdate data dari sebuah model berdasarkan ID atau kata kunci
     *
     * @param string|int $id ID atau kunci yang akan digunakan untuk mengupdate sebuah model
     * @param array      $data Data yang akan di update
     *
     * @return mixed Hasil dari method update(), biasanya instance dari model yang diupdate.
     */

     public function update(string|int $id, array $data): mixed;
}
