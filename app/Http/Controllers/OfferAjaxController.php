<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferAjaxController extends Controller
{
    use OfferTrait;

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
        return view('ajaxoffers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {

        $path = 'images/offers';  // Chemin des img

        if(request()->has('photo')){
            $file_name = $this->saveImage($request->photo, $path);
            $data = $request->only(['name_ar', 'name_en', 'price', 'details_ar', 'details_en', 'photo' ]);
            //$data['photo'] = $file_name;
            $data['photo'] = $path.'/'.$file_name;
        }
        else
        {
            $data = $request->only(['name_ar', 'name_en', 'price', 'details_ar', 'details_en' ]);
        }
        
        $offer = Offer::create($data);
        //$request->session()->flash('status', 'Création validé !!');
        //return redirect()->route('offers.create');
        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => "DONE"
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => "Not DONE"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $offer = Offer::find($request->id);
        if (!$offer)
        return response()->json([
            'status' => false,
            'msg' => "Not found"
        ]);
        $offer = Offer::select('id', 'name_ar', 'name_en', 'price', 'details_ar', 'details_en')->find($request->id);
        return view('ajaxoffers.edit', ['offer' => $offer ]);
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
        $offer = Offer::findOrFail($request->offer_id);
        $offer->update($request->all());

        return response()->json([
            'status' => true,
            'msg' => "UPDATED",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all()
    {
        $offers = Offer::select(
            'id',
            'price',
            'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
            )
        ->limit(10)
        ->get(); // return collection of all result

        return view('ajaxoffers.all', ['offers' => $offers ]);
    }

    public function delete(Request $request)
    {
        $offer = Offer::find($request->id);
        $offer->delete();
        return response()->json([
            'status' => true,
            'msg' => "SUPPRESSION DONE",
            'id' => $request->id
        ]);
    }

}
