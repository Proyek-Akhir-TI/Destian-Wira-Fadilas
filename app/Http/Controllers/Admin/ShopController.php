<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;

use App\Models\Shop;

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
        
		return view('admin.shops.edit', $this->data);
	}

	public function update(ShopRequest $request, $id)
    {
        $params = $request->except('_token');
        
        $shop = Shop::findOrFail($id);
		$shop->status = $params['status'];
                $shop->save();
        if ($shop->update($params)){
            Session::flash('success','Toko telah diperbarui.');
        }

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
