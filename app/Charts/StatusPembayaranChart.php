<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatusPembayaranChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Status Pembayaran')
            ->setSubtitle('Status.')
            ->addData([48, 42])
            ->setHeight(250)
            ->setColors(['#DA0C81', '#610C9F'])
            ->setLabels(['Sudah Bayar', 'Belum Bayar']);
    }
}
