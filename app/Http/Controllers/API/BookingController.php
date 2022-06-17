<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Location;
use App\Models\Location_booking;
use Illuminate\Http\Request;;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;

class BookingController extends ApiController
{
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

        $storageCost = $days * ($location[0]['blockPricePerDay']*$numberOfBlocks);

        return response()->json([
            'clientId'=>$calculateRequest['clientId'],
            'locationId'=>$location[0]['id'],
            'blocks'=>$numberOfBlocks,
            'dateTimeFrom'=>$calculateRequest['dateTimeFrom'],
            'dateTimeBy'=>$calculateRequest['dateTimeBy'],
            'temperature'=>$calculateRequest['temperature'],
            'days'=>$days,
            'storageCost'=>$storageCost
        ])->setStatusCode(200);
    }



    /**
     * generates an access code
     * @return string
     */
    public function accessCode(){
        $code='';
        for($i=0 ; $i < 12 ; $i++){
            $code .=rand(0,9);
        }
        return  $code;
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

        $location = Location::find($request['locationId']);
        $client = Client::find($request['clientId']);

        $booking = Booking::create([
            'client_id'=>$request['clientId'],
            'blocks'=>$request['blocks'],
            'days'=> $request['days'],
            'dateTimeFrom'=>$request['dateTimeFrom'],
            'dateTimeBy'=> $request['dateTimeBy'],
            'temperature'=>$request['temperature'] ,
            'storageCost'=> $request['storageCost'],
            'accessСode'=> "{$this->accessCode()}",
        ]);

        $location->booking()->attach($booking['id']);


        $remainder_blocks = $location['remainder_blocks']-$request['blocks'];
        $location->remainder_blocks = $remainder_blocks;
        $location->save();

        return response()->json([
            'massage'=>'saving a booking',
            'booking'=>$booking,
        ])->setStatusCode(200);
    }

    public function allBookings(){

    }
}
