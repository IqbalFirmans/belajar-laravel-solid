<?php
namespace App\Contracts\Interfaces\Eloquents;

/**
 * Interface BasicInterface
 *
 * Interface ini digunakan untuk mendefinisikan method yang umum digunakan pada
 * sebuah model Eloquent dengan menambahkan sebuah abstakssi yang lebih baik.
 *
 * @package App\Contracts\Interfaces\Eloquents
 */

interface EloquentInterface extends
GetInterface,
ShowInterface,
StoreInterface,
UpdateInterface,
DeleteInterface,
FindInterface
{

}
