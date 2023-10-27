<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahOrderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Jumlah Order')
            ->addData('Bulanan', [7, 3, 8, 2, 6, 4])
            ->setHeight(250)
            ->setColors(['#0802A3'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
