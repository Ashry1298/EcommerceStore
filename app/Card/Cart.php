<?php

namespace App\Cart;

use App\Cart\CartItem;

class Cart
{
    public function addToCart($product_id, int $quantity = 1, $color_id = null, $size_id = null,)
    {
        $item = new CartItem($product_id, $quantity, $size_id, $color_id);
        if ($cartItem = $this->itemExist($item)) {
            $item->updateQuantity($cartItem->quantity);
            $items = $this->replaceItemInCart($item);
            session()->put('cart', $items);
            return;
        }
        $items = $this->getItems();
        $items[] = $item;
        session()->put('cart', $items);
    }

    public function getItems()
    {
        if (session()->has('cart')) {
            return session('cart');
        }
        session()->put('cart', []);
        return session('cart');
    }
    public function itemExist(CartItem $item)
    {
        $items = $this->getItems();
        foreach ($items as $cartItem) {
            if ($cartItem->id == $item->id) {
                return $cartItem;
            }
        }
        return false;
    }


    public function replaceItemInCart($item)
    {
        $items = $this->getItems();
        foreach ($items as $index => $cartItem) {
            if ($cartItem->id == $item->id) {
                $items[$index] = $item;
            }
        }
        return $items;
    }
}
