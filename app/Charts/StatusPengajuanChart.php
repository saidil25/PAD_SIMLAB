<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatusPengajuanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Status Pengujian')
            ->setSubtitle('status')
            ->addData([50, 30])
            ->setHeight(250)
            ->setLabels(['Disetujui', 'Ditolak']);
    }
}
