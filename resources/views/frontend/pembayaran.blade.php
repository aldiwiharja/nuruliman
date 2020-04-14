@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($payment !== null)
                        @php
                            $siswa = \App\Student::where('id', $payment->student_id)->first();
                        @endphp
                        @if ($payment->status !== 1)
                            <h1>SILAHKAN MELAKUKAN PEMBAYARAN</h1>
                            <hr> 
                            <div class="card">
                                <div class="card-header" id="card-head">
                                    <h3 class="text-white"  style="font-family: Arial;">{{ $payment->code }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5><b>Rincian Biaya</b></h5>
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
                                                <tr>
                                                    <td>Biaya Pendaftaran</td>
                                                    <td>:</td>
                                                    <td><b>Rp. {{ number_format($payment->total) }}</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h5><b>Metode Pembayaran</b></h5>
                                            <div class="accordion" id="accordionExample">
                                                <div class="card" style="border-radius: 0%">
                                                    <div class="card-header border-0 bg-success" id="mandiriHead">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link text-white" style="text-decoration: none; color: #333;" type="button" data-toggle="collapse" data-target="#mandiri" aria-expanded="true" aria-controls="mandiri">
                                                                <b>ONLINE TRANSFER KE BANK MANDIRI</b>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                
                                                    <div id="mandiri" class="collapse show" aria-labelledby="mandiriHead" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <p>Silahkan transfer ke nomor rekening di bawah ini !</p>
                                                            <h5 class="card-title" style="font-family: Arial;">1330012007928</h5>
                                                            <p>a/n FUQOH ALFIATULLUTFAH</p>
                                                        </div>
                                                    </div>

                                                    <div class="card-header border-0 bg-danger" id="offileHeade">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link text-white" style="text-decoration: none; color: #333;" type="button" data-toggle="collapse" data-target="#offline" aria-expanded="true" aria-controls="offline">
                                                                <b>OFFLINE DATANG KE SEKOLAH</b>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                
                                                    <div id="offline" class="collapse" aria-labelledby="offileHeade" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <ul>
                                                                <li>Silahkan datang ke sekolah</li>
                                                                <li>Formulir pendaftaran harap dibawa</li>
                                                                <li>Lengkapi persyaratan yang sudah ditentukan</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row p-3 mt-2">
                                        <div class="col-md-12">
                                            <div class="alert alert-info text-center">
                                                <h2>
                                                    Apabila anda sudah melakukan pembayaran. <br>
                                                    Silahkan konfirmasi pembayaran
                                                </h2>
                                                <button onclick="confirmPayment()" id="btn-cp" class="btn btn-success">KONFIRMASI PEMBAYARAN</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                <h1>Anda sudah melakukan pembayaran</h1>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="confirmPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
        <div class="modal-content border-0">
            <div class="modal-header" id="card-head">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">KONFIRMASI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <form action="{{ route('konfirmasi.pembayaran') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $payment->student_id }}">
                            <div class="row justify-content-center " id="form-content">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Upload Bukti Transfer</h4>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anda</label>
                                        <input type="text" class="form-control" value="{{ $siswa->nama_siswa }}" name="nama_byr">
                                    </div>
                                    <div class="form-group">
                                        <label>Bukti Transfer</label>
                                        <input type="file" onchange="terisi(event)" class="form-control" name="bukti_byr">
                                        <small class="text-info">Silahkan upload file bukti transfer disini </small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="btn-upload" class="btn btn-primary btn-block" disabled style="cursor: not-allowed">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    @if(Session::has('msg'))
        @section('script')
            <script>
                Swal.fire(
                    'Pendaftaran Berhasil',
                    'Lanjutkan untuk pembayaran pendaftaran',
                    'success'
                );
            </script>
            
        @endsection
        
    @endif
    @section('script')
        <script>
            function confirmPayment(){
                $('#confirmPayment').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }

            function terisi(e){
                if (e.target.value !== null || e.target.value !== "") {
                    $('#btn-upload').prop('disabled', false);
                    $('#btn-upload').removeAttr('style');
                }
            }

            $('#btn-upload').on('click', function() {
                $(this).html('<i class="fa fa-spin fa-spinner"></i> Submit');
                $('#loadoverlay').removeClass('sembunyi');
            });

        </script>
    @endsection
@endsection