<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Instance;

class PerCityChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $location1 = Instance::where('location', "Dhaka")->count();
        $location2 = Instance::where('location', "Sylhet")->count();
        $location3 = Instance::where('location', "Khulna")->count();
        $location4 = Instance::where('location', "Chittagong")->count();
        $location5 = Instance::where('location', "Bogra")->count();

        $locations = [$location1, $location2, $location3, $location4, $location5];
        return Chartisan::build()
        ->labels(['Dhaka', 'Sylhet', 'Khulna', 'Chittagong', 'Bogra'])
        ->dataset('Sample', $locations);
    }
}