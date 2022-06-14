<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="client request",
 *      description="client request body data",
 *      type="object",
 *
 * )
 */
class clientRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="email client",
     *      example="vasia@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="password client",
     *      format="int64",
     *      example="12345"
     * )
     *
     * @var integer
     */
    public $password;

}
