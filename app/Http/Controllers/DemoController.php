<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function seed()
    {
        Item::truncate();
        $data = collect(json_decode(file_get_contents(database_path('data/MOCK_DATA.json'))));
        $data->map(function ($item) {
            Item::create([
                "first_name" => $item->first_name,
                "last_name" => $item->last_name,
                "email" => $item->email,
                "gender" => $item->gender,
                "avatar" => $item->avatar,
                "city" => $item->city,
                "country" => $item->country,
            ]);
        });
        return "OK";
    }

    public function show()
    {
        $data = Item::orderBy('id', 'desc')->get();
        return ['data' => $data];
    }
}
