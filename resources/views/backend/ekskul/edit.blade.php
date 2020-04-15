@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Ekskul</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('msg'))
                @section('script')
                    {!! Session::get('msg') !!}
                    <script>
                        var img_id = 2;
                        function add_more_image(){
                            var photoAdd =  '<div class="row">';
                            photoAdd +=  '<div class="col-md-1">';
                            photoAdd +=  '<a href="#" onclick="delete_this_row(this)" class="text-danger"><i class="fa fa-trash-o"></i></a>';
                            photoAdd +=  '</div>';
                            photoAdd +=  '<div class="col-md-12 pull-right">';
                            photoAdd +=  '<input type="file" name="galeri[]" id="image-'+img_id+'" class="form-control" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
                            photoAdd +=  '<label for="image-'+img_id+'" class="mw-100 mb-3">';
                            photoAdd +=  '</label>';
                            photoAdd +=  '</div>';
                            photoAdd +=  '</div>';
                            $('#upload-images').append(photoAdd);
                            img_id++;
                        }
                        function delete_this_row(em){
                            $(em).closest('.row').remove();
                        }
                        $('#image-1').on('change', function() {
                            $('#btn-ubah').prop('disabled', false);
                            $('#btn-ubah').removeAttr('style');
                        });
                    </script>
                @endsection
            @endif
        <a href="{{ route('admin.ekskul') }}" class="btn btn-primary nav-item btn-sm mb-2">Kembali</a>
        <div class="tile">
            <div class="tile-title">
                <h3 class="text-center">TAMBAH GALERI {{ \Str::upper($ekskul->name) }}</h3>
            </div>
            <div class="tile-body">
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <form action="{{ route('admin.ekskul.edit.proses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ekskul->id }}">
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <div class="card border-0">
                                <div class="card-body bg-dark">
                                    <div class="form-group">
                                        <label class="text-white">Galeri</label>
                                        <div id="upload-images">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-block btn-primary" onclick="add_more_image()">
                                                        <i class="fa fa-plus"></i> Lebih Banyak
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <input type="file" name="galeri[]" id="image-1" class="form-control" data-multiple-caption="{count} files selected" accept="image/*" />
                                                    <label for="image-1" class="mw-100 mb-3">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                @foreach (json_decode($ekskul->galeri) as $key => $g)
                                    <div class="col-md-3 mt-2">
                                        <div class="card border-0">
                                            <img src="{{ url($g) }}" class="card-img-top">
                                            <div class="p-2 bg-primary">
                                                <a href="{{ url('/admin/extrakurikuler-delete-one-photo/'.$ekskul->id.'/'.$key) }}" class="text-white" style="text-decoration: none">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button type="submit" id="btn-ubah" class="btn btn-block btn-primary" disabled style="cursor: not-allowed">PROSES PERUBAHAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        
    </div>
    </main>
@endsection

@section('script')
    <script>
        var img_id = 2;
        function add_more_image(){
            var photoAdd =  '<div class="row">';
            photoAdd +=  '<div class="col-md-1">';
            photoAdd +=  '<a href="#" onclick="delete_this_row(this)" class="text-danger"><i class="fa fa-trash-o"></i></a>';
            photoAdd +=  '</div>';
            photoAdd +=  '<div class="col-md-12 pull-right">';
            photoAdd +=  '<input type="file" name="galeri[]" id="image-'+img_id+'" class="form-control" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd +=  '<label for="image-'+img_id+'" class="mw-100 mb-3">';
            photoAdd +=  '</label>';
            photoAdd +=  '</div>';
            photoAdd +=  '</div>';
            $('#upload-images').append(photoAdd);
            img_id++;
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }

        $('#image-1').on('change', function() {
            $('#btn-ubah').prop('disabled', false);
            $('#btn-ubah').removeAttr('style');
        });
    </script>
@endsection