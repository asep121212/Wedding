<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreprofilenRequest; 
use App\Http\Requests\UpdateprofilenRequest; 
use App\Models\Profilen; 
use Illuminate\Support\Facades\DB;
class ProfilenController extends Controller
{
    public function index()
    {
        $profilen = DB::table('profilens')->get();
        return view('admin.profilen.profilen', ['profilen' => $profilen]);
    }
    public function index_fr()
    {
        $profilen = DB::table('profilens')->get();
        return view('frontend.profilen', ['profilen' => $profilen ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profilen.profilen-add'); // Adjusted view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretimelineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofilenRequest $request)
    {
        $request->validate([
            'username_wanita' => 'required|string',
            'user_wanita' => 'required|string',
            'username_pria' => 'required|string',
            'user_pria' => 'required|string',
        ]);
        

        $input = $request->all();
        Profilen::create($input); // Make sure your timeline model can handle these fields

        return redirect('/admin/profilen/profilen'); // Adjusted redirect
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $timeline
     * @return \Illuminate\Http\Response
     */
    public function show(profilen $profilen)
    {
        // Show details of a specific date if necessary
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
 
     public function edit(profilen $profilen, $id)
    {
        $profilen = Profilen::findOrFail($id);
        return view('admin.profilen.profilen-edit', [
            'profilen' => $profilen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofileRequest  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprofilenRequest $request, Profilen $profilen)
    {
        $request->validate([
            'username_wanita' => 'required|string',
            'user_wanita' => 'required|string',
            'username_pria' => 'required|string',
            'user_pria' => 'required|string',
        ]);

        $input = $request->all();
        $profilen->update($input);

        return redirect()->route(route: 'profilen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(profilen $profilen,$id)
    {
        DB::table('profilens')->where('id', $id)->delete();
        return redirect('/admin/profilen/profilen'); // Adjusted redirect
    }
} 