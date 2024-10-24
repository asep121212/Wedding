<?php

namespace App\Http\Controllers;

use App\Models\Date; 
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoredateRequest; 
use App\Http\Requests\UpdatedateRequest; 
class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = DB::table('dates')->get(); // Adjusted to the new table
        return view('admin.date.date', ['dates' => $dates]); // Adjusted view
    }

    public function index_fr()
    {
        $dates = DB::table('dates')->get(); // Adjusted to the new table
        return view('frontend.date.index', ['dates' => $dates]); // Adjusted view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.date.date-add'); // Adjusted view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredateRequest $request)
    {
        $request->validate([
            'day' => 'required|string',
            'hour' => 'required|integer',
            'minute' => 'required|integer',
            'second' => 'required|integer',
        ]);

        $input = $request->all();
        Date::create($input); // Make sure your Date model can handle these fields

        return redirect('/admin/date/date'); // Adjusted redirect
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(date $date)
    {
        // Show details of a specific date if necessary
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
 
     public function edit(Date $date)
    {
        return view('admin.date.date-edit', compact('date'));   
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDateRequest  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDateRequest $request, Date $date)
    {
        $request->validate([
            'day' => 'required|string',
            'hour' => 'required|integer',
            'minute' => 'required|integer',
            'second' => 'required|integer',
        ]);

        $input = $request->all();
        $date->update($input);

        return redirect()->route('admin.date.date'); // Adjusted route
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(date $date,$id)
    {
        DB::table('dates')->where('id', $id)->delete();
        return redirect('/admin/date/date'); // Adjusted redirect
    }
} 