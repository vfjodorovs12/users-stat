<?php

namespace Vfjodorovs12\UsersStat\Http\Controllers;

use Illuminate\Routing\Controller;
use Seat\Eveapi\Models\Corporation\CorporationMember;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Seat\Eveapi\Models\RefreshToken; // SEAT 5.x+

class UsersStatController extends Controller
{
    public function index()
    {
        $corporationId = 1599371034; // настроить под себя

        $members = CorporationMember::where('corporation_id', $corporationId)->get();

        $seat_users = DB::table('users')->select('id', 'name', 'main_character_id')->get();
        $seat_names = [];
        foreach ($seat_users as $u) {
            $seat_names[$u->main_character_id] = $u->name;
        }

        $client = new Client(['base_uri' => 'https://esi.evetech.net']);
        $tokens = [];
        foreach ($members as $member) {
            $tokenRow = RefreshToken::where('character_id', $member->character_id)
                ->where('scopes', 'like', '%esi-fleets.read_fleet.v1%')
                ->first();
            if ($tokenRow) {
                $tokens[$member->character_id] = $tokenRow->token;
            }
        }

        foreach ($members as $member) {
            $member->seat_name = $seat_names[$member->character_id] ?? '—';
            $member->corp_name = $member->name ?: $member->character_id;

            $member->start_date_fmt = $member->start_date
                ? Carbon::parse($member->start_date)->format('Y-m-d')
                : ($member->created_at ? Carbon::parse($member->created_at)->format('Y-m-d') : '—');

            $member->logoff_date_fmt = $member->logoff_date
                ? Carbon::parse($member->logoff_date)->format('Y-m-d H:i')
                : ($member->updated_at ? Carbon::parse($member->updated_at)->format('Y-m-d H:i') : '—');

            $member->status = ($member->logoff_date && Carbon::parse($member->logoff_date)->diffInMinutes(now()) < 15)
                ? 'Online'
                : 'Offline';

            $member->fleet_stats = 'Нет доступа';
            if (isset($tokens[$member->character_id])) {
                try {
                    $response = $client->get('/latest/characters/' . $member->character_id . '/fleet/', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $tokens[$member->character_id],
                        ],
                        'query' => [
                            'datasource' => 'tranquility'
                        ],
                        'http_errors' => false,
                        'timeout' => 2,
                    ]);
                    if ($response->getStatusCode() === 200) {
                        $fleet = json_decode($response->getBody()->getContents(), true);
                        $member->fleet_stats = 'Во флоте [' . $fleet['fleet_id'] . '], роль: ' . $fleet['role'];
                    } elseif ($response->getStatusCode() === 404) {
                        $member->fleet_stats = 'Не во флоте';
                    } else {
                        $member->fleet_stats = 'Ошибка (' . $response->getStatusCode() . ')';
                    }
                } catch (\Throwable $e) {
                    $member->fleet_stats = 'Ошибка запроса';
                }
            }
        }

        $log = 'DEBUG LOG: Members loaded: ' . $members->count() . ' at ' . now();

        return view('users-stat::pilots_stats', [
            'members' => $members,
            'log' => $log,
        ]);
    }
}
