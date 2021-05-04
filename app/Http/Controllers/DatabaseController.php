<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Cars;

class DatabaseController extends Controller
{
    /**
     * Create Cars table if it doesn't exist and redirect to home with status update
     *
     * @return  RedirectResponse
     */
    public static function CreateDB()
    {
        // insert dummy data
        DB::table('cars')->insert([
            ['manufacturer' => 'Honda',
                'model' => 'CN250 HELIX',
                'price' => '50000',
                'mileage' => '20000',
                'img_path' => '/images/honda_helix.jpg'],
            ['manufacturer' => 'Audi',
                'model' => 'TT QUATTRO',
                'price' => '45000',
                'mileage' => '5000',
                'img_path' => '/images/Audi_TT_Quatro.jpg'],
            ['manufacturer' => 'Polaris',
                'model' => 'SPORTSMAN 550 EPS BROWNING LE',
                'price' => '30000',
                'mileage' => '30000',
                'img_path' => '/images/Polaris_Sportsman.jpg'],
            ['manufacturer' => 'BMW',
                'model' => '320I XDRIVE',
                'price' => '25000',
                'mileage' => '50000',
                'img_path' => '/images/BMW_320I_XDRIVE.jpg'],
            ['manufacturer' => 'Husqvarna',
                'model' => 'TE610',
                'price' => '10000',
                'mileage' => '1000',
                'img_path' => '/images/Husqvarn_TE610jpg.jpg'],
            ['manufacturer' => 'Volkswagen',
                'model' => 'POINTER',
                'price' => '30000',
                'mileage' => '50000',
                'img_path' => '/images/Volkswagon_Pointer.jpg'],
        ]);
        // Redirect with database filled status
        return redirect()->route('home')->with('status', 'Database Filled!');
    }

    /**
     * Return cars information from DB
     *
     * @return Application|Factory|View
     */
    public function HomeView()
    {
        // Get all car data
        $cars = Cars::all();
        return view('dashboard', ['data' => $cars]);


    }

    /**
     * Return cars information from DB
     *
     * @return Application|Factory|View
     */
    public function BasketView()
    {
        // Get Car data linked to ID
            $cars = Cars::where('id', $_GET['id'])->get();
            return view('basket', ['data' => $cars]);
    }

    /**
     * Return cars information from DB
     *
     * @return Application|Factory|View
     */
    public function purchase()
    {
            $cars = Cars::where('id', $_GET['id'])->get();
            return view('thank-you', ['data' => $cars]);
    }

    /**
     * Return cars information from DB
     *
     * @return RedirectResponse
     */
    public function complete()
    {
        // delete car data after purchase
            DB::table('cars')->where('id', '=', $_GET['id'])->delete();
            return redirect()->route('home');
    }
}
