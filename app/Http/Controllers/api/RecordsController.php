<?php

namespace App\Http\Controllers\api;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\RecordResource;

class RecordsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/records/deleted",
     *     tags={"Records"},
     *     summary="Returns list of records of deleted products before checkout ",
     *     description="Returns a list deleted products before checkout",
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     * )
     */
    public function index()
    {
        $records = RecordResource::collection(Cache::remember('records', 60 * 60 * 24, function () {
            return Record::orderBy('updated_at', 'DESC')->get();
        }));
        // RecordResource is formating our data to what we need in our case we show to the marketing team the slug,name,number of times the product was deleted we called it occurence and created at and updated at formated.
        //Data is cached for 24 hours and it will be updated either after 24 hours or when Records are updated or we created a new one via an observer RecordObserver.

        return response()->json(['records' => $records], 200);
    }
}
