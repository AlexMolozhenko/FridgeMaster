<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;

class LocationController extends ApiController
{
    /**
     * @OA\Get(
     *      path="/user/location",
     *      tags={"Location"},
     *      summary=" returns a list of locations",
     *      description="displays the entire list of available locations with information about the presence of blocks in each",
     *           @OA\Response(
     *              response="200",
     *              description="list of locations",
     *
     *           ),
     *           @OA\Response(
     *              response="404",
     *              description="list of locations is not defined",
     *
     *           )
     * )
     *
     */
    public function allLocation()
    {
        $locations = Location::all();
        return response()->json($locations)->setStatusCode(200);
    }


    /**
     * @OA\Get(
     *     path="/user/location/{location}",
     *     tags={"Location"},
     *     summary="Get a location by ID",
     *     description="By selecting one of the locations, the user is shown a calculator where he can enter the volume of products (in m3), the required storage temperature and storage time (no longer than 24 days).",
     *     @OA\Parameter(
     *          name="location",
     *          description="Location id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\Response(
     *           response="200",
     *           description="information about the location with the number of blocks available ",
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="There is no location for the given id."
     *      )
     * )
     * * @return Illuminate\Http\Response;
     */
    public function getLocation(Location $location){
        return response()->json($location)->setStatusCode(200);
    }

}
