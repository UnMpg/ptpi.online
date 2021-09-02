<!DOCTYPE html>
<html>

    <head>
        <title><?= $querySeminar['name'] ?></title>
        <style>
            .td-0 {
                width: 0%;
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

    <body style="background-image: url('<?= $background ?>'); background-size: 10px;">

        <div class="container">
            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td class="td-5 text-white">
                            <img src="{{ $backgroundPtpi }}" alt="iakmi" width="100">
                        </td>
                        <td class="td-5 text-white">
                            <img src="{{ $backgroundIakmi }}" alt="iakmi" width="100">
                        </td>
                        <td class="td-40 text-white">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td class="td-25" style="text-align: right;">
                            <img src="data:image/png;base64,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y/XXJxEhHou59ajrMxgnJg8nDmiCZqVYO6wcaQgit/oSgcrRSKhgx/Z4NCKFUI4SRKy11grMpJmZleOwVkKAwFo5rBzWjuuwlwYVF+6qqdptCgmtWauGDE6ChNa6cneFkHQYuwX8S9PWkOHETQ/uWLuhOFaTkzopzTPeVs5B3Xf7LgssWABhmysA/FpXdKk5NdWVF5w7bvHCnwoLdp0z5oxtW7a4DuyN69eNGX1qSVHhymVLx445Y9IFF0wcf/6jDz5YFwwKQa4XfOmSJZdddNH4cWMnT5yQvyTfzbh69x23P3j/fUIKx3GkkHfdfscDU6cC4o6//nnsmDGTJ1446cILtmzaIARNvfvuc88++/xxYz94b6aQctZnn1488cJo2M3fgtdffeXUk09cu3qlIKkPcXuvfylIHBMBj/RvigYfWLsBQIuMKYZsodnek5Si8WUxiIRjw1F12FcqQ1dNrdxdOW/u3A3rN+zcsf3rr75647XX3F83b9o8Z86c4qKi/MVLfpg/f968ed9/9/3DDz301z//yY0F37lz5/W/u27unDklxcVzZs+54brrigoKACxbmj992rQdW7e4yaAW/PRTfv7icF3tV198uTw/f853s99/973i4pKPP/zw708+WVJUtGxJ/sMPPARg86ZNc77/vqS0hIji8dhHH3ywZfPmWZ/P2ufD/xtBgoCttcox6JWd22cV7fT4OmRm/NXWILLEIbhEAEBDaGYpmFiDsd/AESFSUgKmaTFTqxbNZn360eZNGwAIotSUZCIppExNSb7+lpv/cvsd3bt0/ej9d7/4/BMAr01/cfPGdWPPP+/VGW9cMPHCrevWvDbtRQBpyUmxcOiNV6YDsLWdlOT3+3wawhRi8OChd9879al/Pjtw0KB335nZJDvznrvvueLKq4cdexwAU8r0pIAbRVSwc3tpUWFebutVq1biV8kmDiq/Rb47AtkCd69fPzSzWbPka0OhWTXhz015SCYIBqAZwoAUySAQy/2xU5TS9Sw4WVVVNeON1++8+17XfwoAzI5S48ae27pN2+5du148acKc72ePPv2s7775tlOnTnfcPSUrO6dbz14r8pd+9dVXv7vlJgB+n+/jjz666LLLW+W2dmxba48QIhyJtO3c8ZKrrgIQiYQLCgry8lpPuPRSSGnbrhueNWtoDWDVypW245w+5oxZX35Z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"
                                alt="" />
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td class="td-10 text-white text-right">
                            Lorem ipsum
                        </td>
                        <td class="td-100" style="text-align: center;">
                            <div style="font-size: 23px;"><b>SERTIFIKAT</b></div>
                            <div style="padding: 5px; 0">
                                <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . url('/') . '/home/sertifikat/scan/' . $query->email . '/' . $querySeminar->id }}"
                                    width="80" height="80" />
                            </div>
                            <div style="display: block; margin-top: 7px; color: #B22222;">NO:
                                PTPI-KEMENKES/2020/07/17-<?= str_pad($query->id, 3, '0', STR_PAD_LEFT); ?></div>
                            <i>Diberikan kepada:</i>
                            <div style="display: block; font-size: 20px; margin-top: 7px;">
                                <b><?php echo isset($query->nama) ? $query->nama : 'SERTIFIKAT' ?></b>
                            </div>
                            <div style="margin-top: 7px;">Atas partisipasinya sebagai</div>
                            <div style="display: block; margin-top: 7px;">PESERTA</div>
                            <div style="display: block; margin-top: 7px;">Dalam Kegiatan Seminar dengan tema</div>
                            <div style="display: block; font-size: 20px; margin-top: 7px;">
                                <b><?= $querySeminar['name'] ?></b></div>
                            <div style="display: block; margin-top: 7px;">yang diselenggarakan oleh</div>
                            <div style="display: block; margin-top: 7px;">PERKUMPULAN TEKNIK PERUMAHSAKITAN INDONESIA
                                bekerjasama dengan KEMENTERIAN KESEHATAN</div>
                            <div style="padding-top: 5px;">REPUBLIK INDONESIA pada 17 Juli 2020, selama 3 jam.</div>
                        </td>
                        <!-- <td class="td-20"></td> -->
                    </tr>
                </tbody>
            </table>

            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td class="td-5 text-white">
                            Loremuea
                        </td>
                        <td class="td-40">
                            <p style="text-align: center; margin-bottom: 5px;">Perkumpulan Teknik Perumahsakitan
                                Indonesia</p>
                            <div style="text-align: center; padding: 8px 0;">
                                <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . url('/') . '/home/sertifikat/ttd/scan/' . $speaker_1 }}"
                                    width="80" height="80" />
                            </div>
                            <div style="text-align: center;">
                                PROF. IR. DR. -ING. EKO SUPRIYANTO
                            </div>
                            <div style="text-align: center; margin-top: 5px;">
                                <span>PRESIDEN</span>
                            </div>
                        </td>
                        <td class="td-10 text-white">
                            Lorem ipsum Lorem ipsum ipsum
                        </td>
                        <td class="td-40">
                            <p style="text-align: center; margin-bottom: 5px;">
                                Kementerian Kesehatan Republik Indonesia
                            </p>
                            <div style="text-align: center; padding: 8px 0;">
                                <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . url('/') . '/home/sertifikat/ttd/scan/' . $speaker_2 }}"
                                    width="80" height="80" />
                            </div>
                            <div style="text-align: center;">
                                dr. ANDI SAGUNI, MA
                            </div>
                            <div style="text-align: center; margin-top: 5px;">
                                <span>DIREKTUR FASYANKES</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </body>

</html>
