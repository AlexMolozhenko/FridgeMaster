<?php

namespace App\Virtual;
/**
 * @OA\Schema(
 *      title="book blocks request",
 *      description="book blocks request body data",
 *      type="object",
 *      required={"userId"}
 * )
 */
class bookblocksRequest
{
    /**
     * @OA\Property(
     *      title="userId",
     *      description="id user",
     *      format="int64",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $userId;

    /**
     * @OA\Property(
     *      title="locationId",
     *      description="id location",
     *      format="int64",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $locationId;

    /**
     * @OA\Property(
     *      title="title",
     *      description="name city",
     *      example="Wilmington (North Carolina)"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="blocks",
     *      description="number of blocks",
     *      format="int64",
     *      example="10"
     * )
     *
     * @var integer
     */
    public $blocks;

    /**
     * @OA\Property(
     *      title="days",
     *      description="amount of days",
     *      format="int64",
     *      example= "10"
     * )
     *
     * @var integer
     *
     */
    public $days;

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
     *      format="int64",
     *      example= "1500"
     * )
     *
     * @var integer
     *
     */
    public $storageCost;

}
