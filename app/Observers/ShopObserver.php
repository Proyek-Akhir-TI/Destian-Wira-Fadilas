<?php

namespace App\Observers;

use App\Mail\ShopActivated;
use App\Models\Shop;
use App\Models\User;

class ShopObserver
{
    /**
     * Handle the Shop "created" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function created(Shop $shop)
    {
        //
    }

    /**
     * Handle the Shop "updated" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function updated(Shop $shop)
    {
        // check if active column is changed from inactive to active

        //     if($shop->getOriginal('active') == false && $shop->active == true){

        //         send mail to customer
        //         \Mail::to('destianwirafa@gmail.com')->send(new ShopActivated($shop));

        //         change role from customer to seller
        //         $shop->user->setRole('Seller');
        //     }else {
        //         dd('shop changed to inactive');
        //     }
    }

    /**
     * Handle the Shop "deleted" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function deleted(Shop $shop)
    {
        //
    }

    /**
     * Handle the Shop "restored" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function restored(Shop $shop)
    {
        //
    }

    /**
     * Handle the Shop "force deleted" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function forceDeleted(Shop $shop)
    {
        //
    }
}
