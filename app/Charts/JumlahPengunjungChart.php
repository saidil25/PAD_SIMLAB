<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahPengunjungChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Jumlah Pengunjung')
            ->addData('Mingguan', [40, 93, 35, 42, 18, 82])
            ->addData('Bulanan', [70, 29, 77, 28, 55, 45])
            ->setHeight(250)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
