<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * Membuat response success dalam bentuk JSON.
     *
     * @param string $message pesan yang akan dikirimkan
     * @param mixed|null $data datanya, jika ada.
     * @return \Illuminate\Http\JsonResponse response Json.
     */
    public function successResponse(string $message, mixed $data = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * Membuat response error dalam bentuk JSON.
     *
     * @param string $message pesan yang ingin dikirimkan
     * @param int $error_code kodel error yang ingin dikirmkan
     * @param mixed|null $data datanya, jika ada.
     * @return \Illuminate\Http\JsonResponse response JSON.
     */
    public function errorResponse(string $message, int $error_code, mixed $data = null, mixed $errors = null): JsonResponse
        {
            return response()->json([
                'success' => false,
                'message' => $message,
                'error_code' => $error_code,
                'data' => $data
            ]);
        }
}
