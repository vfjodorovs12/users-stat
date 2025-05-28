<?php

namespace Vfjodorovs12\UsersStat\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class UsersStatController extends Controller
{
    public function index()
    {
        // Получаем character_id и access_token всех пилотов с валидным токеном
        $characters = DB::table('corporation_members')
            ->join('refresh_tokens', 'corporation_members.character_id', '=', 'refresh_tokens.character_id')
            ->select('corporation_members.character_id', 'refresh_tokens.token')
            ->groupBy('corporation_members.character_id', 'refresh_tokens.token')
            ->get();

        $client = new Client(['base_uri' => 'https://esi.evetech.net/latest/']);
        $pilots = [];

        foreach ($characters as $char) {
            $character_id = $char->character_id;
            $token = $char->token;

            // Получаем имя персонажа
            $character_name = null;
            try {
                $response = $client->get("characters/{$character_id}/", [
                    'headers' => ['Accept' => 'application/json'],
                ]);
                $data = json_decode($response->getBody(), true);
                \Log::info('ESI character', ['id' => $character_id, 'data' => $data]);
                $character_name = $data['name'] ?? 'Неизвестно';
            } catch (\Exception $e) {
                \Log::error('ESI error', ['id' => $character_id, 'error' => $e->getMessage()]);
                $character_name = 'Неизвестно';
            }

            // Получаем статус флота
            $fleet_id = null;
            $role = null;
            if ($token) {
                try {
                    $response = $client->get("characters/{$character_id}/fleet/", [
                        'headers' => [
                            'Authorization' => "Bearer {$token}",
                            'Accept' => 'application/json',
                        ],
                    ]);
                    $data = json_decode($response->getBody(), true);
                    $fleet_id = $data['fleet_id'] ?? null;
                    $role = $data['role'] ?? null;
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    $fleet_id = null;
                    $role = null;
                }
            }

            $pilots[] = [
                'character_id' => $character_id,
                'character_name' => $character_name,
                'fleet_id' => $fleet_id,
                'role' => $role,
            ];
        }

        return view('usersstat::index', compact('pilots'));
    }
}
