<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\models\Offer;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllOffers()
    {
        //$offers = Offer::select('id', 'name', 'price', 'details')->get();

        $offers = Offer::select(
            'id',
            'price',
        //    'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->get(); // return collection of all result

        return view('offers.all', ['offers' => $offers ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $data = $request->only(['name_ar', 'name_en', 'price', 'details_ar', 'details_en', ]);

        $offer = Offer::create($data);
        $request->session()->flash('status', 'Création validé !!');
        return redirect()->route('offers.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
