<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Costume;
use App\Models\Crafts;
use App\Models\Cuisine;
use App\Models\Festival;
use App\Models\Relics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index(Request $request) {
        $arts = Art::all()->random(3);
        $festivals = Festival::all()->random(3);
        $costumes = Costume::all()->random(3);
        $cuisines = Cuisine::all()->random(3);
        $crafts = Crafts::all()->random(3);
        $relics = Relics::all()->random(3);
        return view('index', compact('arts', 'cuisines', 'crafts', 'costumes', 'festivals', 'relics'));
//
    }
}
