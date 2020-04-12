@extends('frontend.layouts.app')

@section('content')
    @php
        $user = Auth::user();
        $student_id = $user->student_id;
        $payment = \App\Payment::where('student_id', $student_id)->first();
        
    @endphp

    <section>
        <div class="container">
            <div class="row p-5">
                <div class="col-md-12 text-center">
                    <i class="fa fa-check fa-4x text-success"></i>
                    <h1>PENDAFTARAN BERHASIL</h1>
                    <h2>SILAHKAN LENGKAPI PERSYARATAN BERIKUT</h2>
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="stepW" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header" id="card-head">
            <h5 class="modal-title text-white" id="exampleModalLongTitle">LANJUTKAN PROSES INI</h5>
        </div>
        <div class="modal-body">
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Download Berkas</a></li>
                    <li><a href="#step-2">Upload Persyaratan</a></li>
                    <li><a href="#step-3">Melakukan Pembayaran</a></li>
                </ul>
                
                <div id="content">
                    <div id="step-1" class="">
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Ceklis</th>
                                            <th>Nama Berkas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="ceklist1">
                                                    <label class="form-check-label" for="ceklist1">
                                                      Cheklist
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="fa fa-file-text text-info"></i> Informasi Login
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="ceklist2">
                                                    <label class="form-check-label" for="ceklist2">
                                                      Cheklist
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="fa fa-file-pdf-o text-info"></i> Formulir Anda
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="ceklist3">
                                                    <label class="form-check-label" for="ceklist3">
                                                      Cheklist
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="fa fa-file-pdf-o text-info"></i> Persyaratan
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-info">
                                    <strong>
                                        <i class="fa fa-warning"></i> Jika semua berkas sudah di download silahkan ceklis untuk melanjutkan ke proses selanjutnya
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-2" class="">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-center">FC KTP ORANG TUA</h5>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUploadKtp" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUploadKtp"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreviewKtp" style=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-center">FC KARTU KELUARGA</h5>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUploadKk" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUploadKk"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreviewKk" style=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-center">FC IJAZAH</h5>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUploadIj" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUploadIj"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreviewIj" style=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-center">SURAT KELULUSAN</h5>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUploadSk" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUploadSk"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreviewSk" style=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-info">
                                    <strong>
                                        <i class="fa fa-warning"></i> Harap lakukan upload dokumen dengan benar, apabila ada dokumen yang belum ada silahkan lewati. Centang tombol di bawah untuk melanjutkan
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="lanjut">
                                    <label class="form-check-label" for="lanjut">
                                        Ceklis ini untuk melanjutkan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-3" class="">
                        <div class="row justify-content-center">
                            <div class="col-md-5 text-center">
                                <button id="pembayaran" class="btn btn-lg btn-primary">
                                    <i class="fa fa-money"></i> LIHAT DETAIL PEMBAYARAN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection



@section('script')
    @if (Session::has('msg'))
        <script>
            Swal.fire(
                'Terimaksih sudah melakukan pendaftaran',
                'Silahkan ikuti proses berikut ini',
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
                        "message": "Calon siswa baru telah daftar silahkan cek di menu siswa"
                    }
                }
            });
        </script>
        
    @endif
    <script>
        var payment_status = "{{ $payment->status }}";
        if (parseInt(payment_status) == 0) {
            $('#stepW').modal({
                backdrop: 'static',
                keyboard: false
            })
        }
        $('#smartwizard').smartWizard({
            lang: {  // Language variables
                next: 'Lanjutkan',
                previous: 'Kembali'
            },
        });

        $('.sw-btn-next').prop('disabled', true);
        $('.sw-btn-next').attr('style', 'cursor:not-allowed');

        // download
        function generateValueChecked() {
            var dataCheckbox = ["#ceklist1","#ceklist2","#ceklist3"];
            var arr = [];
            var checked = false;
            dataCheckbox.forEach(c => {
                var val =$(c).is(':checked');
                if (val) {
                    checked = val;
                    arr.push(checked);
                }
            });
            return arr.length;
        }

        function checkYa() {
            if (generateValueChecked() == 3) {
                $('.sw-btn-next').prop('disabled', false);
                $('.sw-btn-next').removeAttr('style');
            }else{
                $('.sw-btn-next').prop('disabled', true);
                $('.sw-btn-next').attr('style', 'cursor:not-allowed');
            }
        }

        $('#ceklist1').on('change', function(e){
            e.preventDefault();
            var student_id = "{{ Auth::user()->student_id }}";
            var base_url = {!! json_encode(url('/')) !!};
            var url = base_url + "/info_login/siswa_"+student_id+".txt";
            var link=document.createElement('a');
            link.href = url;
            link.download = url.substr(url.lastIndexOf('/') + 1);
            link.click()
            checkYa();
            $(this).prop('disabled', true);
        });
        $('#ceklist2').on('change', function(e){
            e.preventDefault();
            var student_id = "{{ Auth::user()->student_id }}";
            var base_url = {!! json_encode(url('/')) !!};
            var url = base_url + "/pdf/formulir_"+student_id+".pdf";
            var link=document.createElement('a');
            link.href = url;
            link.download = url.substr(url.lastIndexOf('/') + 1);
            link.click();
            checkYa();
            $(this).prop('disabled', true);
        });
        $('#ceklist3').on('change', function(e){
            e.preventDefault();
            var base_url = {!! json_encode(url('/')) !!};
            var url = base_url + "/pdf/persyaratan.pdf";
            var link=document.createElement('a');
            link.href = url;
            link.download = url.substr(url.lastIndexOf('/') + 1);
            link.click();
            checkYa();
            $(this).prop('disabled', true);
        });

        $('#pembayaran').on('click', function() {
            $(this).html(`<i class="fa fa-spin fa-spinner"></i> Mohon tunggu ...`);
            setTimeout(() => {
                location.href = "{{ route('pembayaran') }}";
            }, 2000);
        })

        $('#lanjut').on('change', function() {
            $('.sw-btn-next').prop('disabled', false);
            $('.sw-btn-next').removeAttr('style');
            $(this).prop('disabled', true);
        });

        $('.sw-btn-next').on('click' , function(){
            $('.sw-btn-next').prop('disabled', true);
            $('.sw-btn-next').attr('style', 'cursor:not-allowed');
        })

        $('.sw-btn-prev').on('click', function(){
            $('.sw-btn-next').prop('disabled', false);
            $('.sw-btn-next').removeAttr('style');
        })

        $('.nav-link').on('click', function(){
            $('.sw-btn-next').prop('disabled', false);
            $('.sw-btn-next').removeAttr('style');
        })

        function readURL(input, imgView, url) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imgView).css('background-image', 'url('+e.target.result +')');
                    $(imgView).hide();
                    $(imgView).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('file', input.files[0]);
            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    console.log(res);
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
        $("#imageUploadKtp").change(function() {
            readURL(this,"#imagePreviewKtp","{{ route('upload.ktp') }}");
        });
        $("#imageUploadKk").change(function() {
            readURL(this,"#imagePreviewKk", "{{ route('upload.kk') }}");
        });
        $("#imageUploadIj").change(function() {
            readURL(this,"#imagePreviewIj", "{{ route('upload.ijazah') }}");
        });
        $("#imageUploadSk").change(function() {
            readURL(this,"#imagePreviewSk", "{{ route('upload.sk') }}");
        });
        
    </script>
@endsection
