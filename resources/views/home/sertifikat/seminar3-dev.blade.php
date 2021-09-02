<!DOCTYPE html>
<html>

    <head>
        <title><?= $querySeminar['name'] ?></title>
        <style>
            .td-0 {
                width: 0%;
            }

            .td-2 {
                width: 2%;
            }

            .td-3 {
                width: 3%;
            }

            .td-5 {
                width: 5%;
            }

            .td-10 {
                width: 10%;
            }

            .td-15 {
                width: 15%;
            }

            .td-20 {
                width: 20%;
            }

            .td-25 {
                width: 25%;
            }

            .td-22 {
                width: 22%;
            }

            .td-30 {
                width: 30%;
            }

            .td-35 {
                width: 30%;
            }

            .td-40 {
                width: 40%;
            }

            .td-50 {
                width: 50%;
            }

            .td-75 {
                width: 75%;
            }

            .td-100 {
                width: 100%;
            }

            .text-white {
                color: #fff;
            }
        </style>
    </head>

    <body style="background-image: url('<?= $background ?>'); background-repeat: no-repeat;">

        <div class="container">
            <table class="table-borderless" style="margin-top: 30px; margin-left: 40px; margin-right: 100px;">
                <tbody>
                    <tr>
                        <td class="td-2">
                            &nbsp;
                        </td>
                        <td class="td-5">
                            <img src="{{ $backgroundPtpi }}" alt="logo_ptpi" width="100" height="100" />
                        </td>
                        <td class="td-5 text-white">
                            <img src="{{ $backgroundIakmi }}" alt="iakmi" width="100">
                        </td>
                        <td class="td-5 text-white">
                            <img src="{{ $backgroundIcan }}" alt="iakmi" width="100">
                        </td>
                        <td class="td-22 text-white">
                            Lorem ipsum dolor tes
                            Lorem ipsum dolor tes
                        </td>
                        <td class="td-10 text-white">
                            <img src="{{ $backgroundKominfo }}" alt="iakmi" width="100">
                        </td>
                        <td class="td-35" style="text-align: right;">
                            <img src="{{ $backgroundKemenkes }}" alt="logo_kemenkes"
                                style="width: 180px; height: 90px;" />
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table-borderless" style="margin-top: -90px; margin-left: -30px;">
                <tbody>
                    <tr>
                        <td class="td-5 text-white">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;
                        </td>
                        <td class="td-100" style="text-align: center;">
                            <br><br><br>
                            <div style="font-size: 20px; margin-bottom: 10px; margin-top: 5px;"><b>SERTIFIKAT</b></div>
                            <div>
                                <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . url('/') . '/home/sertifikat/scan/' . $queryNewCertificate->email . '/' . $querySeminar->id }}"
                                    width="70" height="70" />
                            </div>
                            <div style="display: block; margin-top: 7px; color: #B22222;">NO:
                                PTPI-KEMENKES/2020/08/07-<?= str_pad($queryNewCertificate->id, 3, '0', STR_PAD_LEFT); ?>
                            </div>
                            <i>Diberikan kepada:</i>
                            <div style="display: block; font-size: 20px; margin-top: 7px;">
                                <b><?php echo isset($queryNewCertificate->nama) ? $queryNewCertificate->nama : 'SERTIFIKAT' ?></b>
                            </div>
                            <div style="margin-top: 7px;">Atas partisipasinya sebagai</div>
                            <div style="display: block; margin-top: 7px;">PESERTA</div>
                            <div style="display: block; margin-top: 7px;">Dalam Kegiatan Seminar dengan tema</div>
                            <div style="display: block; font-size: 16px; margin-top: 7px;">
                                <div><b>MASTER PLAN RUMAH SAKIT: IMPLEMENTASI TEKNOLOGI KOMUNIKASI DAN INFORMATIKA
                                        4.0</b></div>
                                <div><b>UNTUK RUMAH SAKIT DI ERA
                                        KEBIASAAN BARU</b></div>
                            </div>
                            <div style="display: block; margin-top: 7px;">yang diselenggarakan oleh</div>
                            <div style="display: block; margin-top: 7px; margin-bottom: 7px;">PERKUMPULAN TEKNIK
                                PERUMAHSAKITAN INDONESIA
                                bekerjasama dengan KEMENTERIAN KESEHATAN</div>
                            <span style="margin-top: 15px;">REPUBLIK INDONESIA pada 07 Agustus 2020, selama 3
                                jam.</span>
                        </td>
                        <!-- <td class="td-20"></td> -->
                    </tr>
                </tbody>
            </table>
            <br>
            <table class="table-borderless" style="margin-left: -5px;">
                <tbody>
                    <tr>
                        <td class="td-30 text-white">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </td>
                        <td class="td-40">
                            <p style="text-align: center; margin-bottom: 5px;">Perkumpulan Teknik Perumahsakitan
                                Indonesia</p>
                            <div style="text-align: center; margin: 10px 0;">
                                <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . url('/') . '/home/sertifikat/ttd/scan/' . $speaker_1 }}"
                                    width="80" height="80" />
                            </div>
                            <div style="text-align: center;">
                                Prof. Ir. Dr. -Ing. Eko Supriyanto
                            </div>
                            <div style="text-align: center; margin-top: 5px;">
                                <span>Presiden</span>
                            </div>
                        </td>
                        <td class="td-0 text-white">
                            Lorem ipsum, dolor
                        </td>
                        <td class="td-20 text-white">
                            Lorem ipsum, dolor
                        </td>
                        <td class="td-5 text-white">
                            Lorem ipsum, dolor
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </body>

</html>
