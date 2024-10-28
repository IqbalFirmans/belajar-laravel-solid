<?php
namespace App\Contracts\Interfaces\Eloquents;

/**
 * Interface SearchInterface
 *(
 * Interface ini digunakan untuk mendifinisikan mehtod search() yang akan
 * digunakan untuk melakukan pencarian data pada sebuah model.
 *
 * @package App\Contracts\Interfaces\Eloquents
 */
interface SearchInterface
{
    /**
     * method search() digunakan untuk melakukan pencarian data pada sebuah model
     *
     * @param array $column Nama kolom pada tabel model yang akan dijadikan parameter pencarian.
     * @param string $value Nilai yang akan dijadikan parameter pencarian.
     * @return mixed Query builder instance atau model yang telah di query.
     */
    public function search(array $column, string $value): mixed;
}
