<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahPengajuanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Jumlah Pengajuan')
            ->addData('Bulanan', [6, 9, 3, 4, 10, 8])
            ->setHeight(250)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
