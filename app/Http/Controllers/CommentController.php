<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Date;
use App\Models\Gallery; 
use App\Models\Card; // Add this line to include the Card model
use App\Models\Timeline; // Add this line to include the Card model

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $dates = Date::all(); // Query to fetch all cards
        $timelines = Timeline::all(); // Query to fetch all cards
        $cards = Card::all(); // Query to fetch all cards
        $galleries = Gallery::all(); // Query to fetch all cards

        
        return view('welcome', compact('comments', 'dates','galleries','cards','timelines'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kehadiran' => 'required|integer',
            'pesan' => 'required|string',
        ]);

        Comment::create($request->only('nama', 'kehadiran', 'pesan'));

        return redirect()->route('comments.index')->with('success', 'Ucapan & Doa berhasil dikirim.');
    }
}