<?php

namespace App\Http\Controllers;

use App\Models\Timeline; 
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoretimelineRequest; 
use App\Http\Requests\UpdatetimelineRequest; 
use Illuminate\Http\Request;

class TimelineController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeline = DB::table('timelines')->get();
        return view('admin.timeline.timeline', ['timeline' => $timeline]);
    }
    public function index_fr()
    {
        $timeline = DB::table('timelines')->get();
        return view('frontend.timeline', ['timeline' => $timeline ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.timeline.timeline-add'); // Adjusted view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretimelineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretimelineRequest $request)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'story' => 'required|string',
        ]);

        $input = $request->all();
        Timeline::create($input); // Make sure your timeline model can handle these fields

        return redirect('/admin/timeline/timeline'); // Adjusted redirect
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $timeline
     * @return \Illuminate\Http\Response
     */
    public function show(timeline $timeline)
    {
        // Show details of a specific date if necessary
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
 
     public function edit(timeline $timeline, $id)
    {
        $timeline = Timeline::findOrFail($id);
        return view('admin.timeline.timeline-edit', [
            'timeline' => $timeline
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetimelineRequest  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetimelineRequest $request, Timeline $timeline)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'story' => 'required|string',
        ]);

        $input = $request->all();
        $timeline->update($input);

        return redirect()->route(route: 'timeline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(timeline $timeline,$id)
    {
        DB::table('timelines')->where('id', $id)->delete();
        return redirect('/admin/timeline/timeline'); // Adjusted redirect
    }
} 