<?php
// namespace App\Http\Controllers\Web;
// use Illuminate\Http\Request;
// use DB;
// use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $products = [
            (object) [
                'id' => 1,
                'code' => 'VC001',
                'name' => 'Vacuum Cleaner',
                'model' => 'VC2023',
                'photo' => '1.jpg',
                'description' => 'Powerful vacuum cleaner for home use.',
            ],
            (object) [
                'id' => 2,
                'code' => 'FAN01',
                'name' => 'Electric Fan',
                'model' => 'EFX500',
                'photo' => '2.jpg',
                'description' => 'Cooling fan with adjustable speed.',
            ],
            (object) [
                'id' => 3,
                'code' => 'RHL',
                'name' => 'Toshiba Refrigerator 14"',
                'model' => 'TFR50LG',
                'photo' => '3.jpg',
                'description' => 'Energy-efficient refrigerator.',
            ],
            (object) [
                'id' => 4,
                'code' => 'OVN01',
                'name' => 'Electric Oven',
                'model' => 'EOV300',
                'photo' => '4.jpg',
                'description' => 'Oven with multiple cooking modes.',
            ],
            (object) [
                'id' => 5,
                'code' => 'WM001',
                'name' => 'Washing Machine',
                'model' => 'WMX700',
                'photo' => '5.jpg',
                'description' => 'Automatic washing machine.',
            ],
            (object) [
                'id' => 6,
                'code' => 'HTR01',
                'name' => 'Water Heater',
                'model' => 'WHT400',
                'photo' => '6.jpg',
                'description' => 'Instant water heater.',
            ],
        ];

        return view('products-list', compact('products'));
    }
}