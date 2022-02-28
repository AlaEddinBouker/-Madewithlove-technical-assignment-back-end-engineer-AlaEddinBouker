<?php

namespace App\Http\Controllers\api;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cart",
     *     tags={"Cart"},
     *     summary="Returns list of items added to cart ",
     *     description="Returns list of items added to cart",
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
        $items = CartResource::collection(Cart::content());
        return response()->json(['items' => $items], 200);
    }
    /**
     * @OA\Delete(
     *     path="/api/cart/delete/{id}",
     *     tags={"Cart"},
     *     summary="Removes item from cart",
     *     description="Removes item from card and creating a record in Records table if it's the first time the item is deleted or increments the occurence number",
     *     operationId="delete",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product that needs to be deleted",
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="item not found"
     *     )
     * ),
     */
    public function delete($id)
    {
        $item = Cart::content()->where('rowId', $id)->first();
        if ($item != null) {
            $record = Record::where('slug', $item->id)->first();
            if ($record) {
                $record->update([
                    'occurence' => $record->occurence + 1,
                ]);
            } else {
                Record::create([
                    'name' => $item->name,
                    'slug' => $item->id,
                ]);
            }
            Cart::remove($id);

            return response()->json('Success',200);
        }
        return response()->json(['message'=>'Item not found'],404);
    }
}
