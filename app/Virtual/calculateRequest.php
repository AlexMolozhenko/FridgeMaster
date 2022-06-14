<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="calculate request",
 *      description="calculate request body data",
 *      type="object",
 *      required={"userId"}
 * )
 */
class calculateRequest
{
    /**
     * @OA\Property(
     *      title="ClientId",
     *      description="id user",
     *      format="int64",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $clientId;

    /**
     * @OA\Property(
     *      title="locationId",
     *      description="id location",
     *      example="1"
     * )
     *
     * @var string
     */
    public $locationId;

    /**
     * @OA\Property(
     *      title="volume",
     *      description="production volume",
     *      format="int64",
     *      example="15"
     * )
     *
     * @var integer
     */
    public $volume;

    /**
     * @OA\Property(
     *      title="temperature",
     *      description="product storage temperature",
     *      format="int64",
     *      example="-18"
     * )
     *
     * @var integer
     */
    public $temperature;


    /**
     * @OA\Property(
     *      title="dateTimeFrom",
     *      description="storage time from",
     *      example= "2022-06-11 18:21:32"
     * )
     *
     * @var string
     *
     */
    public $dateTimeFrom;


    /**
     * @OA\Property(
     *      title="dateTimeBy",
     *      description="storage time by",
     *      example= "2022-06-21 18:21:32"
     * )
     *
     * @var string
     *
     */
    public $dateTimeBy;
}
