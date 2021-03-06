<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>PDF</title>
    <style>
        .main {
            margin: 0 auto;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            height: 50px;
        }
    </style>
</head>

<body>

    <section class="main">
        <h1 style="text-align: center">RINCIAN BIAYA</h1>
        <div class="row">
            <div class="col">
                <div style="text-align: center">
                    <h4>
                        ANGGARAN BIAYA PENDAFATARAN SANTRI BARU <br>
                        PONDOK PESANTREN SALAFI MODERN <br>
                        NURUL IMAN AL-HASANAH TAHUN 2020/2021
                    </h4>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col">
                <h4>BIAYA AWAL</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>DAFTAR PEMBIAYAAN</th>
                                <th>NOMINAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($costs as $key => $co)
                                @php
                                    $total += $co->price;
                                @endphp
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $co->name }}</td>
                                    <td align="right">{{ number_format($co->price) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" align="center">
                                    <b>TOTAL</b>
                                </td>
                                <td align="right"><b>{{ number_format($total) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col">
                <h4>BIAYA PERBULAN</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <td colspan="5" align="center">
                                    <b>ANGGARAN PERBULAN</b>
                                </td>
                            </tr>
                            <tr>
                                <td>NO</td>
                                <td colspan="2" align="center">SMK/MA</td>
                                <td colspan="2" align="center">SMP/MTS</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $type0 = [];
                                $type1 = [];
                                foreach ($monthly_fees as $key => $mf) {
                                    if ($mf->type == 0) {
                                        array_push($type0, ['attr'=>$mf->attribute, 'price'=>$mf->price]);
                                    }
                                    if ($mf->type == 1) {
                                        array_push($type1, ['attr'=>$mf->attribute, 'price'=>$mf->price]);
                                    }
                                }
                                $totalT0 = 0;
                                foreach ($type0 as $key => $tt0) {
                                    $totalT0 += $tt0['price'];
                                }
                                $totalT1 = 0;
                                foreach ($type1 as $key => $tt1) {
                                    $totalT1 += $tt1['price'];
                                }
                            @endphp


                            @foreach ($type0 as $key => $t0)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $type0[$key]['attr'] }}</td>
                                    <td align="right">{{ number_format($type0[$key]['price']) }}</td>
                                    <td>{{ $type1[$key]['attr'] }}</td>
                                    <td align="right">{{ number_format($type1[$key]['price']) }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>
                                </td>
                                <td><b>TOTAL</b></td>
                                <td align="right"><b>{{ number_format($totalT0) }}</b></td>
                                <td><b>TOTAL</b></td>
                                <td align="right"><b>{{ number_format($totalT1) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


</body>

</html>