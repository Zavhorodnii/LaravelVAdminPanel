<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ProductInfo;
use Hamcrest\Thingy;

class Product_
{
    private $product_id = null;

    private $product = null;
    private $product_info = null;

    private $name = '';
    private $slug = null;
    private $status = false;
    private $top = false;
    private $description = null;
    private $sku = null;
    private $price = 0;
    private $regular_price = 0;
    private $weight = 0;
    private $length = 0;
    private $width = 0;
    private $height = 0;
    private $dimensions = null;
    private $category_ids = null;
    private $image_id = null;
    private $gallery_image_ids = null;
    private $set = null;

    public function __construct($product_id = null){
        if( !isset($product_id) ) {
            $this->product = new Product;
            $this->product_info = new ProductInfo;
        } else {
            $this->product_id = $product_id;
        }
    }

    public function set_name($name){
        if(isset($name)){
            $this->name = $name;
            return true;
        }else
            return false;
    }
    public function set_slug($slug){
        if(isset($slug)){
            $this->slug = $slug;
            return true;
        }else
            return false;
    }
    public function set_status($status){
        if(isset($status)){
            $this->status = $status;
            return true;
        }else
            return false;
    }
    public function set_top($top){
        if(isset($top)){
            $this->top = $top;
            return true;
        }else
            return false;
    }
    public function set_description($description){
        if(isset($description)){
            $this->description = $description;
            return true;
        }else
            return false;
    }
    public function set_sku($sku){
        if(isset($sku)){
            $this->sku = $sku;
            return true;
        }else
            return false;
    }
    public function set_price($price){
        if(isset($price)){
            $this->price = $price;
            return true;
        }else
            return false;
    }
    public function set_regular_price($regular_price){
        if(isset($regular_price)){
            $this->regular_price = $regular_price;
            return true;
        }else
            return false;
    }
    public function set_weight($weight){
        if(isset($weight)){
            $this->weight = $weight;
            return true;
        }else
            return false;
    }
    public function set_length($length){
        if(isset($length)){
            $this->length = $length;
            return true;
        }else
            return false;
    }
    public function set_width($width){
        if(isset($width)){
            $this->width = $width;
            return true;
        }else
            return false;
    }
    public function set_height($height){
        if(isset($height)){
            $this->height = $height;
            return true;
        }else
            return false;
    }
    public function set_dimensions($dimensions){
        if(isset($dimensions)){
            $this->dimensions = $dimensions;
            return true;
        }else
            return false;
    }
    public function set_category_ids($category_ids){
        if(isset($category_ids)){
            $this->category_ids = $category_ids;
            return true;
        }else
            return false;
    }
    public function set_image_id($image_id){
        if(isset($image_id)){
            $this->image_id = $image_id;
            return true;
        }else
            return false;
    }
    public function set_gallery_image_ids($gallery_image_ids){
        if(isset($gallery_image_ids)){
            $this->gallery_image_ids = $gallery_image_ids;
            return true;
        }else
            return false;
    }
    public function set_set($set){
        if(isset($set)){
            $this->set = $set;
            return true;
        }else
            return false;
    }


    public function get_name(){
        if(isset($this->name) && $this->name != ''){
            return $this->name;
        }else
            return null;
    }
    public function get_slug(){
        if(isset( $this->slug) && $this->name != ''){
            return  $this->slug;
        }else
            return null;
    }
    public function get_status(){
        if(isset($this->status) && $this->name != ''){
            return $this->status;
        }else
            return null;
    }
    public function get_top(){
        if(isset($this->top) && $this->top != ''){
            return $this->top;
        }else
            return null;
    }
    public function get_description(){
        if(isset($this->description) && $this->name != ''){
            return $this->description;
        }else
            return null;
    }
    public function get_sku(){
        if(isset($this->sku) && $this->name != ''){
            return $this->sku;
        }else
            return null;
    }
    public function get_price(){
        if(isset($this->price) && $this->name != ''){
            return $this->price;
        }else
            return null;
    }
    public function get_regular_price(){
        if(isset($this->regular_price) && $this->name != ''){
            return $this->regular_price;
        }else
            return null;
    }
    public function get_weight(){
        if(isset($this->weight) && $this->name != ''){
            return $this->weight;
        }else
            return null;
    }
    public function get_length(){
        if(isset($this->lenght) && $this->name != ''){
            return $this->lenght;
        }else
            return null;
    }
    public function get_width(){
        if(isset($this->width) && $this->name != ''){
            return $this->width;
        }else
            return null;
    }
    public function get_height(){
        if(isset($this->height) && $this->name != ''){
            return $this->height;
        }else
            return null;
    }
    public function get_dimensions(){
        if(isset($this->dimensions) && $this->name != ''){
            return $this->dimensions;
        }else
            return null;
    }
    public function get_image_id(){
        if(isset($this->image_id) && $this->name != ''){
            return $this->image_id;
        }else
            return null;
    }


    public function get_category_ids(){

    }
    public function get_gallery_image_ids(){

    }
    public function get_set(){

    }


    public function create_product($params){
        if( isset( $params['name'] ) && count( $params['name'] ) > 0 ){
            $this->set_name( $params['name'] );
        }
        if( isset( $params['slug'] ) && count( $params['slug'] ) > 0 ){
            $this->set_slug( $params['slug'] );
        }
        if( isset( $params['status'] ) && count( $params['status'] ) > 0 ){
            $this->set_status( $params['status'] );
        }
        if( isset( $params['top'] ) && count( $params['top'] ) > 0 ){
            $this->set_top( $params['top'] );
        }
        if( isset( $params['description'] ) && count( $params['description'] ) > 0 ){
            $this->set_description( $params['description'] );
        }
        if( isset( $params['short_description'] ) && count( $params['short_description'] ) > 0 ){
            $this->set_short_description( $params['short_description'] );
        }
        if( isset( $params['sku'] ) && count( $params['sku'] ) > 0 ){
            $this->set_sku( $params['sku'] );
        }
        if( isset( $params['price'] ) && count( $params['price'] ) > 0 ){
            $this->set_price( $params['price'] );
        }
        if( isset( $params['regular_price'] ) && count( $params['regular_price'] ) > 0 ){
            $this->set_regular_price( $params['regular_price'] );
        }
        if( isset( $params['weight'] ) && count( $params['weight'] ) > 0 ){
            $this->set_weight( $params['weight'] );
        }
        if( isset( $params['length'] ) && count( $params['length'] ) > 0 ){
            $this->set_length( $params['length'] );
        }
        if( isset( $params['width'] ) && count( $params['width'] ) > 0 ){
            $this->set_width( $params['width'] );
        }
        if( isset( $params['height'] ) && count( $params['height'] ) > 0 ){
            $this->set_height( $params['height'] );
        }
        if( isset( $params['dimensions'] ) && count( $params['dimensions'] ) > 0 ){
            $this->set_dimensions( $params['dimensions'] );
        }
        if( isset( $params['category_ids'] ) && count( $params['category_ids'] ) > 0 ){
            $this->set_category_ids( $params['category_ids'] );
        }
        if( isset( $params['image_id'] ) && count( $params['image_id'] ) > 0 ){
            $this->set_image_id( $params['image_id'] );
        }
        if( isset( $params['gallery_image_ids'] ) && count( $params['gallery_image_ids'] ) > 0 ){
            $this->set_gallery_image_ids( $params['gallery_image_ids'] );
        }
        if( isset( $params['set'] ) && count( $params['set'] ) > 0 ){
            $this->set_set( $params['set'] );
        }

    }


    public function save(){
        if( isset($this->product_id) )
            Product::find($this->product_id)->delete();

        $this->product->draft = $this->status;
        $this->product->top   = $this->top;
        $this->product->name  = $this->name;
        $this->product->save();

        if( !isset($this->product_id) )
            $this->product_id = $this->product->id;

        $this->product_info->product_id = $this->product_id;
        $this->product_info->slug = $this->slug;
        $this->product_info->description = $this->description;
        $this->product_info->sku = $this->sku;
        $this->product_info->price = $this->price;
        $this->product_info->regular_price = $this->regular_price;
        $this->product_info->weight = $this->weight;
        $this->product_info->length = $this->length;
        $this->product_info->width = $this->width;
        $this->product_info->height = $this->height;
        $this->product_info->dimensions = $this->dimensions;
        $this->product_info->category_ids = $this->category_ids;
        $this->product_info->image_id = $this->image_id;
        $this->product_info->gallery_image_ids = $this->gallery_image_ids;
        $this->product_info->set = $this->set;

        $this->product_info->save();
    }

}
