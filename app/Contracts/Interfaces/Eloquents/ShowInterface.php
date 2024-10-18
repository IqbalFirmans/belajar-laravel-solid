<?php
namespace App\Contracts\Interfaces\Eloquents;

/**
 * interface ShowInterface
 *
 * interface ini digunakan untuk mendefinisikan method show() yang akan
 * digunakan untuk mengambil model berdasarkan ID atau kunci.
 *
 * @package App\Contracts\Interfaces\Eloquents
 */

interface ShowInterface
{
    /**
     * method show() digunakan untuk mendapatkan model berdasarkan ID atau Kunci.
     *
     * @param string|int $id ID atau kunci yang akan digunakan untuk mendapatkan model.
     * @return mixed Model yang sesuai dari ID atau kunci yang diberikan.
     */

     public function show(string|int $id): mixed;
}
