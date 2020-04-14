@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>PEMBAYARAN ANDA</h1>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary nav-load">Kembali</a>
                    <hr>
                    @if ($payment !== null)
                        @php
                            $siswa = \App\Student::where('id', $payment->student_id)->first();
                        @endphp
                        <div class="card">
                            <div class="card-header" id="card-head">
                                <h3 class="text-white"  style="font-family: Arial;">{{ $payment->code }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5><b>Pembayaran</b></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <td>Tanggal Daftar</td>
                                                <td>:</td>
                                                <td>{{ date('d M Y H:i:s', strtotime($payment->created_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Siswa</td>
                                                <td>:</td>
                                                <td>{{ $siswa->nama_siswa }}</td>
                                            </tr>
                                            <tr>
                                                <td>No Pembayaran</td>
                                                <td>:</td>
                                                <td>{{ $payment->code }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <td>Status Pembayaran</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($payment->status == 0)
                                                        <div class="badge badge-danger">Belum Bayar</div>
                                                    @elseif ($payment->status == 1)
                                                        <div class="badge badge-success">Sudah Bayar</div>
                                                    @elseif ($payment->status == 2)
                                                        <div class="badge badge-info">Menunggu Konfirmasi Admin</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Pendaftaran</td>
                                                <td>:</td>
                                                <td><b>Rp. {{ number_format($payment->total) }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Bukti Pembayaran</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($payment->bukti !== null)
                                                        <a href="{{ url($payment->bukti) }}" download><i class="fa fa-download"></i> Bukti Transfer</a>
                                                    @else 
                                                        -    
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                @if ($payment->status !== 0)
                                    <div class="row mt-2">
                                        <div class="col">
                                            <b>Beritahu admin apabila anda sudah bayar</b><br>
                                            @php
                                                $wa = json_decode(\App\Setting::where('key', 'whatsapp_setting')->first()->value);
                                                $url = "https://api.whatsapp.com/send?phone=".$wa[0]."&text=Saya%20sudah%20melakukan%20pembayaran";
                                            @endphp
                                            <a target="_blank" href="{{ $url }}" class="btn btn-success">
                                                <i class="fa fa-send"> Beritahu Admin</i>
                                            </a>
                                        </div>
                                    </div>
                                @else 
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <a href="{{ route('pembayaran') }}" class="btn btn-primary">BAYAR SEKARANG</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if(Session::has('msg'))
        @section('script')
            <script>
                Swal.fire(
                    'Terimaksih sudah melakukan pembayaran',
                    'Silahkan tunggu konfirmasi dari admin',
                    'info'
                );
                let dt = "{{ \App\User::where('role', 'admin')->first()->device_token }}";
                $.ajax({
                    url: "https://api.pushy.me/push?api_key=61cd005dd4ef70809d7d1f9eb8c98008ad44499e1342b573f2953a4a3601e74b",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "to": dt,
                        "data": {
                            "message": "Pembayaran baru telah masuk silahkan cek di menu pembayaran"
                        }
                    }
                });
            </script>
        @endsection
    @endif
@endsection