<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Instance;

class PerYearChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $year1 = Instance::where('year', "2015")->count();
        $year2 = Instance::where('year', "2016")->count();
        $year3 = Instance::where('year', "2017")->count();
        $year4 = Instance::where('year', "2018")->count();
        $year5 = Instance::where('year', "2019")->count();
        $year6 = Instance::where('year', "2020")->count();
        $year7 = Instance::where('year', "2021")->count();
        $year8 = Instance::where('year', "2022")->count();
        $year9 = Instance::where('year', "2023")->count();
        $year10 = Instance::where('year', "2024")->count();

        $years = [$year1, $year2, $year3, $year4, $year5, $year6, $year7, $year8, $year9, $year10];
        return Chartisan::build()
            ->labels(['2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'])
            ->dataset('Sample', $years);
    }
}