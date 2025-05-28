<?php

namespace Vfjodorovs12\UsersStat\Http\Controllers;

use Illuminate\Routing\Controller;
use Vfjodorovs12\UsersStat\Models\Pilot;

class UsersStatController extends Controller
{
    public function index()
    {
        // Получаем всех пилотов с количеством посещённых флотов
        $pilots = Pilot::withCount('fleetStats')->orderBy('character_name')->get();

        return view('usersstat::index', compact('pilots'));
    }
}
