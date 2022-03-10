<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\Notification;
use App\Http\Controllers\Admin\Controller;

use App\Http\Controllers\Front\ImageControl;
use App\Mail\ConsultationMail;
use App\Mail\OrderMail;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){

        $product_id = trim($request->input('product_id'));
        $Product = Products::find($product_id);

        if(!isset($_COOKIE['user_id'])) setcookie('user_id', uniqid());

        $user_id = $_COOKIE['user_id'];

        \Cart::session($user_id);


        if (!\Cart::has($product_id)){
            \Cart::add([
                'id' => strval($Product->id),
                'name' => $Product->title,
                'price' => $Product->regular_price ?? $Product->price,
                'quantity' => 1,
                'attributes' => array(
                    'image'     => ImageControl::get_image_url($Product->file_id),
                    'slug'      => $Product->slug
                ),
                'associatedModel' => $Product
            ]);

            $cookie_control = 'add';
        }
        else {
            \Cart::remove($product_id);
            $cookie_control = 'remove';
        }
        Session::save();

        $subTotal = \Cart::getSubTotal();

        $cartCollection = \Cart::getContent();
        $headerCartGift = [];
        if($cartCollection->count() > 0) {
            $all_cart = \Cart::getContent($Product->id)->toArray();
            $headerCartGift[] = '<div class="basket__items"><div class="basket__item ">';
            foreach ($all_cart as $cart_item) {
                $headerCartGift[] = $this->addToGiftHTMLHeader($cart_item);
            }
            $headerCartGift[] = $this->addHeaderCartBotton($subTotal);
            $headerCartGift[] = '</div></div>';
        } else{
            $headerCartGift[] = '<span>Корзина пуста</span>';
        }


        return response()
            ->json([
                'status'            => 'ok',
                'subTotal'          => $subTotal,
                'cookie_control'    => $cookie_control,
                'headerCartGift'    => implode('', $headerCartGift),
                'cartCount'         => $cartCollection->count()
            ]);
    }

    public function changeQuantity(Request $request){

        $product_id = intval(trim($request->input('id')));
        $quantity = intval(trim($request->input('quantity')));

        $user_id = $_COOKIE['user_id'];

        \Cart::session($user_id);

        \Cart::update($product_id, array(
            'quantity' => array(
            'relative' => false,
            'value' => $quantity
        ),
        ));
        Session::save();

        $subTotal = \Cart::getSubTotal();



        return response()
            ->json([
                'status'            => 'ok',
                'cartSubTotal'      => $subTotal,
                'productSubtotal'   => \Cart::get($product_id)->getPriceSum()
            ]);
    }

    public function removeProduct(Request $request){

        $product_id = trim($request->input('id'));

        $user_id = $_COOKIE['user_id'];
        \Cart::session($user_id)->remove($product_id);
        Session::save();

        $subTotal = \Cart::getSubTotal();
        $cartCollection = \Cart::getContent();

        return response()
            ->json([
                'status'            => 'ok',
                'cartSubTotal'      => $subTotal,
                'cartCount'         => $cartCollection->count()
            ]);
    }

    public function gift(Request $request){

        $product_id = intval(trim($request->input('id')));

        $user_id = $_COOKIE['user_id'];
        \Cart::session($user_id)->remove('gift');
        $Product = Products::find($product_id);

        \Cart::add([
            'id' => 'gift',
            'name' => $Product->title,
            'price' => 0,
            'quantity' => 1,
            'attributes' => array(
                'image'     => ImageControl::get_image_url($Product->file_id),
                'slug'      => $Product->slug,
                'id' => strval($Product->id)
            ),
            'associatedModel' => $Product
        ]);
        Session::save();

        $html = $this->addToGiftHTML(\Cart::getContent($Product->id)->toArray()['gift']);
        $headerCartGift = $this->addToGiftHTMLHeader(\Cart::getContent($Product->id)->toArray()['gift']);

        $subTotal = \Cart::getSubTotal();
        $cartCollection = \Cart::getContent();

        return response()
            ->json([
                'status'            => 'ok',
                'cartSubTotal'      => $subTotal,
                'giftHtml'          => $html,
                'headerCartGift'    => $headerCartGift,
                'cartCount'         => $cartCollection->count()
            ]);
    }

    public function order(Request $request){

        $form_name = trim($request->input('name'));
        $form_phone = trim($request->input('phone'));
        $form_email = trim($request->input('email'));

        $user_id = $_COOKIE['user_id'];
        \Cart::session($user_id);

        $cartContent = \Cart::getContent()->toArray();

        $email_body[] = 'Имя: ' . $form_name;
        $email_body[] = 'Номер телефона: ' . $form_phone;
        $email_body[] = 'Email: ' . $form_email;
        $email_body[] = '';

        foreach ($cartContent as $cart_item){
            $id_product = $cart_item['id'];
            if ($id_product == 'gift')
                $id_product = $cart_item['attributes']['id'];
            $email_body[] = 'id: ' . $id_product;
            $email_body[] = 'Название товара: ' . $cart_item['name'];
            $email_body[] = 'Цена товара: ' . $cart_item['price'];
            $email_body[] = 'Количество: ' . $cart_item['quantity'];
            $email_body[] = 'url: ' . route('product-page', $id_product);
            $email_body[] = '';
        }

        Mail::to(User::select('email')->where('name', '=', 'admin')->first())
            ->send(new OrderMail(
                implode("\n\r", $email_body),
            ));
        Notification::addNotification('order', 'Новый заказ. Проверьте почту', null);

        \Cart::clear();
        Session::save();


        $subTotal = \Cart::getSubTotal();
        $cartCollection = \Cart::getContent();

        return response()
            ->json([
                'status'            => 'ok',
                'cartSubTotal'      => $subTotal,
                'cartCount'         => $cartCollection->count()
            ]);
    }

    private function addToGiftHTML($item){
        return '<div class="shop__item js-remove-gift js-cart-elem js-get-cart-item"  data-product-id="' . $item['id'] .'">
                    <div class="shop__product">
                        <a href="' . route('product-page', $item['attributes']['slug']) .'" class="shop__img ibg">
                            <picture>
                                <source srcset="' . \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) .'" type="image/webp">
                                <img src="' . \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) .'" alt="Gantelya">
                            </picture>
                        </a>
                        <a href="' . route('product-page', $item['attributes']['slug']) .'" class="shop__name">' . $item['name'] .'</a>
                    </div>
                    <div class="shop__prices">
                        <div class="shop__price">
                            <div class="shop__price-all">Подарок</div>
                        </div>
                        <div class="shop__delete">
                            <div class="shop__delete-icon icon js-remove-product"> <svg>
                                    <use href="' . \Illuminate\Support\Facades\URL::asset('front') .'/img/sprite/sprite.svg#delete">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>';
    }

    private function addToGiftHTMLHeader( $item ){
        return '<div class="basket__top js-remove-gift js-cart-elem js-get-cart-item" data-product-id="' .$item['id'].'">
                    <div class="basket__left">
                        <a href="' . route('product-page', $item['attributes']['slug']) .'" class="basket__img ibg">
                            <picture>
                                <source srcset="' . \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) .'" type="image/webp">
                                <img src="' . \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) .'" alt="Gantelya">
                            </picture>
                        </a>
                        <a href="' . route('product-page', $item['attributes']['slug']) .'" class="basket__name">' . $item['name'] .'</a>
                    </div>
                    <div class="basket__right">
                        <div class="basket__count">
                        ' .
                        ( $item['id'] == 'gift' ? 'ПОДАРОК' : '<span class="js-paste-quantity">'. $item['quantity'] .'</span>*'. $item['price'] .' руб')
                        . '
                        </div>
                        <div class="basket__delete">

                            <div class="basket__icon icon js-remove-product">
                                <svg>
                                    <use href="' . \Illuminate\Support\Facades\URL::asset('front') .'/img/sprite/sprite.svg#delete">
                                    </use>
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>';
    }

    private function addHeaderCartBotton($subtotal){
        return '<div class="basket__bottom js-paste-header-items">
                    <div class="basket__all">
                        Итого: <span class="js-paste-cart-subTotal">'. $subtotal .' руб</span>
                    </div>
                    <div class="basket__btn">
                        <a href="'. route('cart.page') .'" class="btn">Оформить заказ</a>
                    </div>
                </div>';
    }
}
