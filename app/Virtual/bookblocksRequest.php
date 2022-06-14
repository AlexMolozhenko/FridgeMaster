<?php

namespace App\Virtual;
/**
 * @OA\Schema(
 *      title="book blocks request",
 *      description="book blocks request body data",
 *      type="object",
 *      required={"clientId"}
 * )
 */
class bookblocksRequest
{
    /**
     * @OA\Property(
     *      title="clientId",
     *      description="id client",
     *      example="1"
     * )
     *
     * @var string
     */
    public $clientId;

    /**
     * @OA\Property(
     *      title="locationId",
     *      description="id location",
     *      example="1"
     * )
     * @var string
     */
    public $locationId;


    /**
     * @OA\Property(
     *      title="blocks",
     *      description="number of blocks",
     *      example="10"
     * )
     * @var string
     */
    public $blocks;

    /**
     * @OA\Property(
     *      title="days",
     *      description="amount of days",
     *      example= "10"
     * )
     *
     * @var string
     *
     */
    public $days;

    /**
     * @OA\Property(
     *      title="dateTimeFrom",
     *      description="storage time from",
     *      example="2022-06-11 18:21:32"
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

    /**
     * @OA\Property(
     *      title="temperature",
     *      description="storage temperature",
     *      example= "-18"
     * )
     *
     * @var string
     *
     */
    public $temperature;

    /**
     * @OA\Property(
     *      title="storageCost",
     *      description="storage Cost",
     *      example= "1500"
     * )
     *
     * @var string
     *
     */
    public $storageCost;
}
