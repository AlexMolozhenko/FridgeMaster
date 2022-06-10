<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
class HomeController extends ApiController
{
    /**
     * @OA\Get(
     *      path="/user/location",
     *      tags={"User"},
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
        return response()->json($locations,200);
    }

    /**
     * @OA\Get(
     *     path="/user/location/{location}",
     *     tags={"User"},
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
        return response()->json($location,200);
    }


    /**
     * @OA\Post (
     *     path="/user/calculate",
     *     tags={"User"},
     *     summary=" Calculate the required number of blocks.",
     *     description="After pressing the “Calculate” button, the required number of blocks is displayed, based on which the storage cost and availability are calculated (there are not always enough free blocks)",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/calculateRequest")
     *      ),
     *         @OA\Response(
     *           response="200",
     *           description="information about the location with the number of blocks available ",
     *      ),
     *         @OA\Response(
     *          response="404",
     *          description="There is no location for the given id."
     *      )
     * )
     *
     * @return Illuminate\Http\Response;
     */
    public function calculate(Request $request){
        return \response()->json($request->all(),200);
    }
}
