<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahPenggunaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Jumlah Pengguna')
            ->addData('Mingguan', [6, 9, 3, 4, 10, 8])
            ->addData('Bulanan', [7, 3, 8, 2, 6, 4])
            ->setHeight(250)
            ->setColors(['#FF4B91', '#0802A3'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
