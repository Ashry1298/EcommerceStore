<?php
namespace App\Cart;
class CartItem
{

    public string $id;
    public function __construct(public readonly  int $Product_id, public  int $quantity = 1, public readonly ?int $size_id, public readonly ?int $color_id)
    {
        $this->id = $Product_id . '-' . $color_id . '-' . $size_id;
    }

    public function updateQuantity(int $newQuantity)
    {
        $this->quantity += $newQuantity;
    }
}
