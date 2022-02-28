<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Returns list of products ",
     *     description="Returns list of products",
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     * )
     */
    function index()
    {
        $products = json_decode(file_get_contents(storage_path() . '/products.json'));
        return response()->json(['products' => $products], 200);
    }
}
