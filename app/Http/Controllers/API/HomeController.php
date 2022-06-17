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
class HomeController extends ApiController
{
    /**
     * @OA\Post(
     *      path="/user",
     *      tags={"Auth"},
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

}
