<?php


namespace App\Helpers;


class Cart
{
    private string $product_id  = '';
    private string $image_url = '';
    private string $title = '';
    private int $price = 0;
    private int $quantity = 0;

    public function __construct( string $product_id, string $image_url, string $title, int $price, int $quantity)
    {
        $this->product_id = $product_id;
        $this->image_url = $image_url;
        $this->title = $title;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function addQuantity(){
        $this->quantity++;
    }
    public function subQuantity(){
        $this->quantity--;
    }

    public function getProductId(): string
    {
        return $this->product_id;
    }
    public function getImageUrl(): string
    {
        return $this->image_url;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getQuantity(): string
    {
        return $this->quantity;
    }
    public function getPrice(): string
    {
        return $this->price;
    }
}
