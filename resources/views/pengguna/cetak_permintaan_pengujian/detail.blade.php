<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $service['data_konfig']->nama_sistem . ' | ' . $subtitle }}</title>
    <link rel="icon" href="{{ asset($service['data_konfig']->logo) }}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body onload="window.print()">

    <div class="container">
        <img class="col-md-12" src="{{ asset($service['data_konfig']->kop_surat) }}" alt="">
        <div class="col-md-12 text-center">
            <strong>
                <u>PERMINTAAN PENGUJIAN<br>Penerimaan Contoh Uji dan Kaji Ulang Permintaan Pengujian</u>
            </strong>
        </div>

        <div class="col-md-12 mt-5">
            <strong>
                I. PERMINTAAN PENGUJIAN
            </strong>
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-6"><strong>KODE CONTOH UJI : </strong></div>
                    <div class="col-md-6"><strong>KODE LACAK : </strong></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-4">1) Nama Pelanggan</div>
                    <div class="col-md-1 text-right">:</div>
                    <div class="col-md-7">{{ $data_user->name }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-4">2) Alamat Pelanggan / No. Telp. / HP</div>
                    <div class="col-md-1 text-right">:</div>
                    <div class="col-md-7">{{ $data_user->alamat .' / '. $data_user->nomor_hp }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-4">3) Nama / Jenis Contoh</div>
                    <div class="col-md-1 text-right">:</div>
                    <div class="col-md-7">{{ $all_data->jenis->nama }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-4">4) Tanggal Masuk Contoh</div>
                    <div class="col-md-1 text-right">:</div>
                    <div class="col-md-7">{{ $all_data->created_at }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-4">5) Kegiatan Paket Pekerjaan</div>
                    <div class="col-md-1 text-right">:</div>
                    <div class="col-md-7">{{ $all_data->kegiatan }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="col-md-12">
                <div class="row border border-secondary">
                    <div class="col-md-12">6) Rincian Pengujian :</div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 border border-secondary"><strong>No. </strong></div>
                    <div class="col-md-2 border border-secondary"><strong>Uraian Parameter</strong></div>
                    <div class="col-md-2 border border-secondary"><strong>Nama Contoh</strong></div>
                    <div class="col-md-2 border border-secondary"><strong>Metode </strong></div>
                    <div class="col-md-2 border border-secondary"><strong>Harga</strong></div>
                    <div class="col-md-1 border border-secondary"><strong>Jumlah</strong></div>
                    <div class="col-md-2 border border-secondary"><strong>SubTotal</strong></div>
                </div>
            </div>

            @php
            date_default_timezone_set('Asia/Jakarta');
            $total = 0;
            $no = 1;
            @endphp

            @foreach($transaksi_produk as $dt)
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 border border-secondary">{{ $no++ }}</div>
                    <div class="col-md-2 border border-secondary">{{ $dt->parameter_uji->nama }}</div>
                    <div class="col-md-2 border border-secondary">{{ $dt->nama }}</div>
                    <div class="col-md-2 border border-secondary">{{ $dt->parameter_uji->kode_sni }}</div>
                    <div class="col-md-2 border border-secondary">{{ number_format($dt->parameter_uji->tarif,0,',','.') }}</div>
                    <div class="col-md-1 border border-secondary">{{ $dt->jumlah }}</div>
                    <div class="col-md-2 border border-secondary">{{ number_format(($dt->parameter_uji->tarif * $dt->jumlah),0,',','.') }}</div>
                </div>
            </div>
            @php
            $total = $total + ($dt->parameter_uji->tarif * $dt->jumlah);
            @endphp
            @endforeach

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10 border border-secondary"><strong>Total</strong></div>
                    <div class="col-md-2 border border-secondary"><strong>{{ number_format($total,0,',','.') }}</strong></div>
                </div>
            </div>

            <div class="col-md-12 mt-5 text-right">
                {{ 'Yogyakarta, ' . date('d-m-Y', time()) }}
            </div>

            <div class="col-md-12 mt-4 text-right">
                <div class="row">
                    <div class="col-md-6 text-center">
                        Petugas Loket
                        <br><br><br><br><br><br>
                        (...........................................)
                    </div>
                    <div class="col-md-6 text-center">
                        Pelanggan
                        <br><br><br><br><br><br>
                        (...........................................)
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                Catatan:
                <br>- Apabila terdapat perubahan yang mengakibatkan pengujian tidak dapat dilakukan atau disubkonrakkan, maka akan ada
                pemberitahuan dari BP2 paling lambat 3 (tiga) hari kerja sejak Permintaan Pengujian diterima.
                <br>- Jumlah hari dalam perkiraan pengerjaan adalah dalam hari kerja.
                <br>*) Penerbitan Sertifikat Hasil Uji (SHU) maksimum 2 (dua) hari kerja setelah selesai pelaksanaan uji
            </div>

            <div class="col-md-12 mt-5">
                <strong>
                    II. PENERIMAAN SAMPLE / CONTOH UJI (Abnormalitas)
                </strong>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1 border border-secondary"><strong>No. </strong></div>
                        <div class="col-md-4 border border-secondary"><strong>Uraian</strong></div>
                        <div class="col-md-3 border border-secondary"><strong>Kondisi Contoh</strong></div>
                        <div class="col-md-4 border border-secondary"><strong>Keterangan</strong></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1 border border-secondary">1)</div>
                        <div class="col-md-4 border border-secondary">Jumlah</div>
                        <div class="col-md-3 border border-secondary"></div>
                        <div class="col-md-4 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1 border border-secondary">2)</div>
                        <div class="col-md-4 border border-secondary">Kondisi</div>
                        <div class="col-md-3 border border-secondary"></div>
                        <div class="col-md-4 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-1 border border-secondary">3)</div>
                        <div class="col-md-4 border border-secondary">Tempat contoh / wadah</div>
                        <div class="col-md-3 border border-secondary"></div>
                        <div class="col-md-4 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-1 border border-secondary">4)<br><br><br><br></div>
                        <div class="col-md-7 border border-secondary">Catatan:<br><br><br><br></div>
                        <div class="col-md-4 border border-secondary">Penerima Contoh,<br><br><br><br></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <strong>
                    III. KAJI ULANG PERMINTAAN PENGUJIAN
                </strong>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1 border border-secondary">1)</div>
                        <div class="col-md-4 border border-secondary">Kemampuan SDM</div>
                        <div class="col-md-3 border border-secondary"></div>
                        <div class="col-md-4 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1 border border-secondary">2)</div>
                        <div class="col-md-4 border border-secondary">Kesesuaian Metode</div>
                        <div class="col-md-3 border border-secondary"></div>
                        <div class="col-md-4 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-1 border border-secondary">3)</div>
                        <div class="col-md-4 border border-secondary">Kemampuan Peralatan</div>
                        <div class="col-md-3 border border-secondary"></div>
                        <div class="col-md-4 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-1 border border-secondary">4)</div>
                        <div class="col-md-4 border border-secondary">Kesimpulan</div>
                        <div class="col-md-7 border border-secondary"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-1 border border-secondary">5)<br><br><br><br></div>
                        <div class="col-md-7 border border-secondary">Catatan:<br><br><br><br></div>
                        <div class="col-md-4 border border-secondary">Ka. Seksi Pengujian/Kortek/Penyelia,<br><br><br><br></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4 text-right">
                <div class="row">
                    <div class="col-md-6 text-center">
                    </div>
                    <div class="col-md-6 text-center">
                        {{ 'Yogyakarta, ' . date('d-m-Y', time()) }}
                        Pelanggan
                        <br><br><br><br><br><br>
                        (...........................................)
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-5">
                Catatan:
                <br>- Apabila terdapat perubahan yang mengakibatkan pengujian tidak dapat dilakukan atau disubkonrakkan, maka akan ada
                pemberitahuan dari BP2 paling lambat 3 (tiga) hari kerja sejak Permintaan Pengujian diterima.
                <br>- Jumlah hari dalam perkiraan pengerjaan adalah dalam hari kerja.
                <br>*) Penerbitan Sertifikat Hasil Uji (SHU) maksimum 2 (dua) hari kerja setelah selesai pelaksanaan uji
            </div>

        </div>
    </div>

</body>

</html>