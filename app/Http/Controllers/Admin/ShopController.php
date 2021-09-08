<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ShopRequest;

use App\Mail\ShopActivated;

use App\Models\Shop;
use App\Models\Role;

use Str;
use Auth;
use DB;
use Session;
use App\Authorizable;

class ShopController extends Controller
{
    use Authorizable;

    public function __construct()
	{
		parent::__construct();

		$this->data['statuses'] = Shop::STATUSES;
	}

    public function index(Request $request)
	{
        $this->data['shops']=Shop::orderBy('name', 'ASC')->paginate(10);

		return view('admin.shops.index', $this->data);
    }

	public function edit($id)
	{
		// $order = Order::withTrashed()->findOrFail($id);

		$shop = Shop::findOrFail($id);
		
        $this->data['shop'] = $shop;
        $this->data['provinces'] = $this->getProvinces();
		$this->data['cities'] = isset(\Auth::user()->province_id) ? $this->getCities(\Auth::user()->province_id) : [];
        $this->data['roles'] = Role::pluck('name', 'id');
        
		return view('admin.shops.edit', $this->data);
	}

	public function update(ShopRequest $request, $id)
    {
        Session::flash('success','Toko telah diperbarui.');
        $params = $request->except('_token');
        
        $shop = Shop::findOrFail($id);
        
		$shop->status = $params['status'];
            $shop->save();
        if ($shop->getOriginal('active') == false && $shop->active == true){
            
        }else {
            //  dd('shop changed to inactive');
         }

        \Mail::to($shop->user)->send(new ShopActivated($shop));

        return redirect('admin/shops');
    }

	public function destroy($id)
    {
        $shop = Shop::findOrFail($id);

        if ($shop->delete()){
            Session::flash('success', 'Toko telah dihapus.');
        }
        return redirect('admin/shops');
    }
}
