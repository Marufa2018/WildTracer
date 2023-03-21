<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Instance;

class PieChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $animal_type1 = Instance::where('animal_type', "Tiger")->count();
        $animal_type2 = Instance::where('animal_type', "Fox")->count();
        $animal_type3 = Instance::where('animal_type', "Hawk")->count();
        $animal_type4 = Instance::where('animal_type', "Lizard")->count();
        $animal_type5 = Instance::where('animal_type', "White-tailed Eagle")->count();
        $animal_type6 = Instance::where('animal_type', "Cat")->count();
        $animal_type7 = Instance::where('animal_type', "Dog")->count();

        $animal_types = [$animal_type1, $animal_type2, $animal_type3, $animal_type4, $animal_type5, $animal_type6, $animal_type7];
        return Chartisan::build()
            ->labels(['Tiger', 'Fox', 'Hawk', 'Lizard', 'White-tailed Eagle', 'Cat', 'Dog'])
            ->dataset('Sample', $animal_types);
    }
}