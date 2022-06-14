<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\Client;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
class HomeController extends ApiController
{
    /**
     * @OA\Post(
     *      path="/user",
     *      tags={"Login"},
     *      summary=" returns a list of locations",
     *      description="displays the entire list of available locations with information about the presence of blocks in each",
     *          @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/clientRequest")
     *      ),
     *           @OA\Response(
     *              response="200",
     *              description="user",
     *
     *           ),
     *           @OA\Response(
     *              response="404",
     *              description="User is not found",
     *
     *           )
     * )
     * @return Illuminate\Http\Response;
     */
    public function getUser(Request $request)
    {
            $client = Client::where('email',$request['email'])->get();

            if($client[0]['password']==$request['password']){
                return \response()->json(['clientId'=>$client[0]['id']])->setStatusCode(200);
            }

                return \response()->json([
                    'message'=>'Invalid password'
                ])->setStatusCode(404);
    }

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
     *           description="number of blocks and amount",
     *      ),
     *         @OA\Response(
     *          response="404",
     *          description="not enough blocks"
     *      )
     * )
     *
     * @return Illuminate\Http\Response;
     */
    public function calculate(Request $request){

        $calculateRequest = $request->all();
        $location = Location::where('id',$request->input('locationId'))->get();

        $numberOfBlocks = ceil(($calculateRequest['volume'] / 2  ));

        $getblock = Location::where('id',$request->input('locationId'))->get('remainder_blocks');
        $block = $getblock[0]['remainder_blocks'];

        if($block < $numberOfBlocks){
            return response()->json([
                'massage'=>'not enough blocks',
                'remainder blocks'=>$block
            ])->setStatusCode(404);
        }


        $d1 = $calculateRequest['dateTimeFrom'] ;
        $d2 = $calculateRequest['dateTimeBy'];
        $d1_ts = strtotime($d1);
        $d2_ts = strtotime($d2);
        $seconds = abs($d1_ts - $d2_ts);
        $days = floor($seconds / 86400);

        $storageCost = $days * $location[0]['blockPricePerDay'];

        return response()->json([
            'userId'=>$calculateRequest['userId'],
            'locationId'=>$location[0]['id'],
            'blocks'=>$numberOfBlocks,
            'dateTimeFrom'=>$calculateRequest['dateTimeFrom'],
            'dateTimeBy'=>$calculateRequest['dateTimeBy'],
            'temperature'=>$calculateRequest['temperature'],
            'days'=>$days,
            'storageCost'=>$storageCost
        ])->setStatusCode(200);
    }

    public function accessCode(){
        $code='';
        for($i=0 ; $i < 12 ; $i++){
            $code .=rand(0,9);
        }
        return $code;
    }


    /**
     *  @OA\Post (
     *     path="/user/bookBlocks",
     *     tags={"User"},
     *     summary=" block booking.",
     *     description="If the user agrees with the results of the calculator, he clicks on the booking button Book blocks",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/bookblocksRequest")
     *      ),
     *      @OA\Response(
     *           response="200",
     *           description="booking confirmation and issuance of booking number",
     *      ),
     *        @OA\Response(
     *          response="404",
     *          description="this booking already exists"
     *      )
     *  )
     * @return Illuminate\Http\Response;
     */
    public function bookBlocks(Request $request){



//       booking::create([
//            'client_id'=> $request['clientId'],
//            'location_id'=> $request['locationId'],
//            'blocks'=> $request['blocks'],
//            'days'=> $request['days'],
//            'dateTimeFrom'=> $request['dateTimeFrom'],
//            'dateTimeBy'=> $request['dateTimeBy'],
//            'temperature'=> $request['temperature'],
//            'storageCost'=> $request['storageCost'],
//            'accessСode'=> $this->accessCode()
//        ]);

//        DB::table('bookings')->insert([
//            'client_id'=> $request['clientId'],
//            'location_id'=>$request['locationId'],
//            'blocks'=>$request['blocks'],
//            'days'=>$request['days'],
//            'dateTimeFrom'=>$request['dateTimeFrom'],
//            'dateTimeBy'=>$request['dateTimeBy'],
//            'temperature'=>$request['temperature'],
//            'storageCost'=>$request['storageCost'],
//            'accessСode'=> $this->accessCode()
//        ]);

        $booking= new booking();
        $booking->fill($request->all());
        $booking->save();
        return response()->json([
            'massage'=>'saving a booking',
            'all'=>$this->accessCode()
       ])->setStatusCode(200);
    }

}
