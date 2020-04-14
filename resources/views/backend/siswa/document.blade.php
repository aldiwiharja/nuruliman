<div class="modal-header" id="card-head">
    <h5 class="modal-title" id="showDocsLabel">KELENGKAPAN DOKUMEN</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @if (Auth::check())
        @if ($document !== null)
            <span id="document_id" hidden>{{ $document->id }}</span>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th align="center">KTP ORANG TUA</th>
                                    <th align="center">KARTU KELUARGA</th>
                                    <th align="center">IJAZAH</th>
                                    <th align="center">SURAT KELULUSAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">
                                        @if ($document->ktp_orang_tua !== null)
                                            <i class="fa fa-check text-success fa-2x"></i>
                                            <div id="current-ktp">
                                                <img src="{{ url($document->ktp_orang_tua) }}" alt="" class="img-fluid" width="200">
                                            </div>
                                            <div id="edit-ktp" style="display: none">
                                                <h5 class="text-center">FC KTP ORANG TUA</h5>
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUploadKtp-modal" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUploadKtp-modal"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreviewKtp-modal" style=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button onclick="editKtp()" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ url($document->ktp_orang_tua) }}" class="btn btn-success btn-sm" download>
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <h5>Belum di upload</h5>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if ($document->kk !== null)
                                            <i class="fa fa-check text-success fa-2x"></i>
                                            <div id="current-kk">
                                                <img src="{{ url($document->kk) }}" alt="" class="img-fluid" width="200">
                                            </div>
                                            <div id="edit-kk" style="display: none">
                                                <h5 class="text-center">FC KARTU KELUARGA</h5>
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUploadKk-modal" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUploadKk-modal"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreviewKk-modal" style=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button onclick="editKk()" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ url($document->kk) }}" class="btn btn-success btn-sm" download>
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        @else 
                                            <h5>Belum di upload</h5>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if ($document->ijazah !== null)
                                            <i class="fa fa-check text-success fa-2x"></i>
                                            <div id="current-ij">
                                                <img src="{{ url($document->ijazah) }}" alt="" class="img-fluid" width="200">
                                            </div>
                                            <div id="edit-ij" style="display: none">
                                                <h5 class="text-center">FC IJAZAH</h5>
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUploadIj-modal" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUploadIj-modal"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreviewIj-modal" style=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button onclick="editIj()" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ url($document->ijazah) }}" class="btn btn-success btn-sm" download>
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        @else 
                                            <h5>Belum di upload</h5>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if ($document->surat_kelulusan !== null)
                                            <i class="fa fa-check text-success fa-2x"></i>
                                            <div id="current-sk">
                                                <img src="{{ url($document->surat_kelulusan) }}" alt="" class="img-fluid" width="200">
                                            </div>
                                            <div id="edit-sk" style="display: none">
                                                <h5 class="text-center">SURAT KELULUSAN</h5>
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUploadSk-modal" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUploadSk-modal"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreviewSk-modal" style=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button onclick="editSk()" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ url($document->surat_kelulusan) }}" class="btn btn-success btn-sm" download>
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        @else 
                                            <h5>Belum di upload</h5>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button id="proses-perubahan" class="btn btn-block btn-lg btn-success">
                        PROSES PERUBAHAN
                    </button>
                </div>
            </div>
        @else 
            <div class="row mt-2">
                <div class="col">
                    <div class="alert alert-info">
                        <h5>Siswa belum melakukan upload dokumen</h5>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>

<script>
    var document_id = $('#document_id').text();
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
        formData.append('document_id', document_id);
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
                if (err.status == 200) {
                    Swal.fire(
                        'Berhasil',
                        'Dokumen berhasil diubah',
                        'success'
                    );
                    $('#loadoverlay').addClass('sembunyi');
                }
            }
        });
    }

    $("#imageUploadKtp-modal").change(function() {
        readURL(this,"#imagePreviewKtp-modal","{{ route('admin.upload.ktp') }}");
        $('#loadoverlay').removeClass('sembunyi');
    });
    $("#imageUploadKk-modal").change(function() {
        readURL(this,"#imagePreviewKk-modal", "{{ route('admin.upload.kk') }}");
        $('#loadoverlay').removeClass('sembunyi');
    });
    $("#imageUploadIj-modal").change(function() {
        readURL(this,"#imagePreviewIj-modal", "{{ route('admin.upload.ijazah') }}");
        $('#loadoverlay').removeClass('sembunyi');
    });
    $("#imageUploadSk-modal").change(function() {
        readURL(this,"#imagePreviewSk-modal", "{{ route('admin.upload.sk') }}");
        $('#loadoverlay').removeClass('sembunyi');
    });
    
    function editKtp() {
        $('#current-ktp').hide();
        $('#edit-ktp').show();
    }

    function editKk() {
        $('#current-kk').hide();
        $('#edit-kk').show();
    }

    function editIj() {
        $('#current-ij').hide();
        $('#edit-ij').show();
    }

    function editSk() {
        $('#current-sk').hide();
        $('#edit-sk').show();
    }

    $('#proses-perubahan').on('click', function() {
        $(this).html('<i class="fa fa-spin fa-spinner"></i> PROSES PERUBAHAN');
        $('#loadoverlay').removeClass('sembunyi');
        setTimeout(() => {
            location.reload();
        }, 2000);
    });
</script>