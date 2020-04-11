<div class="modal-header" id="card-head">
    <h5 class="modal-title" id="showDocsLabel">KELENGKAPAN DOKUMEN</h5>
</div>
<div class="modal-body">
    @if (Auth::check())
        @if ($document !== null)
            <div class="row mt-2">
                <div class="col-md-12">
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
                                        <i class="fa fa-check text-success fa-2x"></i><br>
                                        <img src="{{ url($document->ktp_orang_tua) }}" alt="" class="img-fluid" width="200">
                                    @else
                                        <i class="fa fa-times text-danger fa-2x"></i><br> 
                                        <h5>Belum di upload</h5>
                                    @endif
                                </td>
                                <td align="center">
                                    @if ($document->kk !== null)
                                        <i class="fa fa-check text-success fa-2x"></i><br>
                                        <img src="{{ url($document->kk) }}" alt="" class="img-fluid" width="200">
                                    @else 
                                        <h5>Belum di upload</h5>
                                    @endif
                                </td>
                                <td align="center">
                                    @if ($document->ijazah !== null)
                                        <i class="fa fa-check text-success fa-2x"></i><br>
                                        <img src="{{ url($document->ijazah) }}" alt="" class="img-fluid" width="200">
                                    @else 
                                        <h5>Belum di upload</h5>
                                    @endif
                                </td>
                                <td align="center">
                                    @if ($document->surat_kelulusan !== null)
                                        <i class="fa fa-check text-success fa-2x"></i><br>
                                        <img src="{{ url($document->surat_kelulusan) }}" alt="" class="img-fluid" width="200">
                                    @else 
                                        <h5>Belum di upload</h5>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif
</div>