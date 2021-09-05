<?php

namespace App\Http\Controllers;

use App\Mail\ShopActivationRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Shop;
use App\Models\User;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
	{
		parent::__construct();

		$this->middleware('auth');
	}

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();

		$this->data['user'] = $user;
        $this->data['provinces'] = $this->getProvinces();
		$this->data['cities'] = isset(\Auth::user()->province_id) ? $this->getCities(\Auth::user()->province_id) : [];
		

        return $this->loadTheme('shops.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //add validation
        $request->validate ([
            'name' => 'required',
        ]);

        //save db
        Shop::create([
            'user_id'     => \Auth::user()->id,
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'city_id'     => $request->input('city_id'),
            'province_id' => $request->input('province_id'),
        ]);


        //send mail to admin
        $shop = array(
            'name'        => $request->name,
            'description' => $request->description,
            'city_id'     => $request->city_id,
            'province_id' => $request->province_id,
        );
        
        \Mail::to('destianwirafa@gmail.com')->send(new ShopActivationRequest($shop));
        
        // \Session::flash('success', "Pengajuan pembuatan toko Anda telah dikirim.");
        return redirect('home')->with("Pengajuan pembuatan toko Anda telah dikirim.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    
}
