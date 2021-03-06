<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

	protected $table = 'product_inventories';
    protected $fillable = [
        'product_id',
        'stock',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id');
    }

    /**
	 * Reduce stock product
	 *
	 * @param int $productId product ID
	 * @param int $stock       stock product
	 *
	 * @return void
	 */
	public static function reduceStock($productId, $stock)
	{
		$inventory = self::where('product_id', $productId)->firstOrFail();

		if ($inventory->stock < $stock) {
			$product = Product::findOrFail($productId);
			throw new \App\Exceptions\OutOfStockException('Produk '. $product->sku .' telah habis');
		}

		$inventory->stock = $inventory->stock - $stock;
		$inventory->save();
	}

	/**
	 * Increase stock product
	 *
	 * @param int $productId product ID
	 * @param int $stock       stock product
	 *
	 * @return void
	 */
	public static function increaseStock($productId, $stock)
	{
		$inventory = self::where('product_id', $productId)->firstOrFail();
		$inventory->stock = $inventory->stock + $stock;
		$inventory->save();
	}
}
