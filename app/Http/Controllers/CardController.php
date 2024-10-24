<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorecardRequest;
use App\Http\Requests\UpdatecardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = DB::table('cards')->get();
        return view('admin.card.card', ['card' => $card]);
    }
    public function index_fr()
    {
        $card = DB::table('cards')->get();
        return view('frontend.card', ['card' => $card ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.card.card-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecardRequest $request)
    {
        $request->validate([
            'text' => 'required',
            'atas_nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            // Store the image in 'public/images' directory
            $path = $image->store('images', 'public');
            $input['image'] = $path; // Save the image path to the database
        }
    
        Card::create($input);
    
        return redirect('/admin/card/card');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\card  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\card  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(card $card, $id)
    {
        $card = Card::findOrFail($id);
        return view('admin.card.card-edit', [
            'card' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecardRequest  $request
     * @param  \App\Models\card  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecardRequest $request, card $card)
{
    $request->validate([
        'atas_nama' => 'required',
        'text' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        // Store the image in 'public/images' directory
        $path = $image->store('images', 'public');
        $input['image'] = $path; // Update the image path in the database
    } else {
        unset($input['image']);
    }

    $card->update($input);

    return redirect()->route(route: 'card.index');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(card $card, $id)
    {
        DB::table('cards')->where('id', $id)->delete();
        return redirect('/admin/card/card');
    }
}