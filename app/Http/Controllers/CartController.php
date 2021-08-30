<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductInventory;

class CartController extends Controller
{
    // public function __construct()
	// {
	// 	parent::__construct();
	// }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();
        $this->data['items'] =  $items;

		return $this->loadTheme('carts.index', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->except('_token');
		
		$product = Product::findOrFail($params['product_id']);
		$slug = $product->slug;

		$attributes = [];
		if ($product->configurable()) {
			$product = Product::from('products as p')
							->whereRaw("p.parent_id = :parent_product_id
							and (select pav.text_value 
									from product_attribute_values pav
									join attributes a on a.id = pav.attribute_id
									where a.code = :ukuran_code
									and pav.product_id = p.id
									limit 1
								) = :ukuran_value
								", [
									'parent_product_id' => $product->id,
									'ukuran_code' => 'ukuran',
									'ukuran_value' => $params['ukuran'],
								])->firstOrFail();

			$attributes['ukuran'] = $params['ukuran'];
		}

		$itemQuantity =  $this->_getItemQuantity(md5($product->id)) + $params['stock'];
		$this->_checkProductInventory($product, $itemQuantity);

		$item = [
			'id' => md5($product->id),
			'name' => $product->name,
			'price' => $product->price,
			'quantity' => $params['stock'],
			'attributes' => $attributes,
			'associatedModel' => $product,
		];

		\Cart::add($item);

		\Session::flash('success', 'Produk '. $item['name'] .' telah ditambahkan ke keranjang');
		return redirect('/product/'. $slug);
    }

	/**
	 * Get total quantity per item in the cart
	 *
	 * @param string $itemId item ID
	 *
	 * @return int
	 */
	private function _getItemQuantity($itemId)
	{
		$items = \Cart::getContent();
		$itemQuantity = 0;
		if ($items) {
			foreach ($items as $item) {
				if ($item->id == $itemId) {
					$itemQuantity = $item->quantity;
					break;
				}
			}
		}

		return $itemQuantity;
	}

	/**
	 * Check product inventory
	 *
	 * @param Product $product      product object
	 * @param int     $itemQuantity stock
	 *
	 * @return int
	 */
	private function _checkProductInventory($product, $itemQuantity)
	{
		if ($product->productInventory->stock < $itemQuantity) {
			throw new \App\Exceptions\OutOfStockException('Produk '. $product->sku .' telah kehabisan stok');
		}
	}

	/**
	 * Get cart item by card item id
	 *
	 * @param string $cartID cart ID
	 *
	 * @return array
	 */
	private function _getCartItem($cartID)
	{
		$items = \Cart::getContent();

		return $items[$cartID];
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = $request->except('_token');

		if ($items = $params['items']) {
			foreach ($items as $cartID => $item) {
				$cartItem = $this->_getCartItem($cartID);
				$this->_checkProductInventory($cartItem->associatedModel, $item['quantity']);
				\Cart::update($cartID, [
					'quantity' => [
					'relative' => false,
					'value' => $item['quantity'],
					],
				]);
			}

			\Session::flash('success', 'Keranjang telah diperbarui');
			return redirect('carts');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);

		return redirect('home');
    }
}
