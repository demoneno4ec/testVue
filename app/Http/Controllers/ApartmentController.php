<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Models\Apartment;
use Illuminate\Contracts\Support\Renderable;

class ApartmentController extends Controller
{
    public function index(): Renderable
    {
        return view('index');
    }

    public function list()
    {
        $apartments = Apartment::factory()->count(9)->make(['image' => 'https://i.ytimg.com/vi/u4PLCLefGNs/hqdefault.jpg']);

        return $apartments->toJson();
    }
}
