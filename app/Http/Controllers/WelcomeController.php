<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery; 
use App\Models\Card; // Add this line to include the Card model
use App\Models\Date; // Add this line to include the Card model
use App\Models\Timeline; // Add this line to include the Card model
use App\Models\Comment; // Add this line to include the Card model

class WelcomeController extends Controller
{
    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  

    public function welcome()
    {
        // Fetch galleries data and cards for the welcome page
        $galleries = Gallery::all(); // Query to fetch all galleries
        $cards = Card::all(); // Query to fetch all cards
        $dates = Date::all(); // Query to fetch all cards
        $timelines = Timeline::all(); // Query to fetch all cards
        $comments = Comment::all(); // Query to fetch all cards

        // Pass both galleries and cards data to the welcome view
        return view('welcome', [
            'galleries' => $galleries,
            'cards' => $cards,
            'dates' => $dates,
            'timelines'=> $timelines,
            'comments'=> $comments


        ]);
    }
}