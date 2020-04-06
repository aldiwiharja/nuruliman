@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>DRAFT BIAYA BULANAN</h2>
    </div>
    <div class="row">
        <div class="col">
            @if(Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif
            <button data-toggle="modal" data-target="#addAttr" class="btn mb-2 btn-block btn-primary">
                <i class="fa fa-plus"></i> Tambah Attribute
            </button>
            <div class="modal fade" id="addAttr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Tambah Attribute</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <form action="{{ route('admin.biaya.bulanan.attr') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Attribute</label>
                                        <input type="text" name="attr" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>BIAYA BULANAN SMK/MA</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Attribute</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($monthly_fees as $key => $mf)
                                                @if ($mf->type == 0)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $mf->attribute }}</td>
                                                        <td>
                                                            <input onkeyup="updatePrice0(this.value, {{ $mf->id }})" class="form-control" type="number" value="{{ $mf->price }}">
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>BIAYA BULANAN SMP/MTS</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Attribute</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($monthly_fees as $key => $mf)
                                                @if ($mf->type == 1)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $mf->attribute }}</td>
                                                        <td>
                                                            <input class="form-control" onkeyup="updatePrice1(this.value, {{ $mf->id }})" type="number" value="{{ $mf->price }}">
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection

@section('script')
    <script>
        function updatePrice0(val, id){
            $.ajax({
                url: "{{ route('admin.update.price0') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    price: val
                },
                success: function(res){
                    if (res == 1) {
                        $.notify({
                            title: "Perubahan : ",
                            message: "Harga telah di rubah",
                            icon: 'fa fa-check' 
                        },{
                            type: "success"
                        });
                    }
                },
                error : function(err){
                    console.log(err);
                }
            });
        }

        function updatePrice1(val, id){
            $.ajax({
                url: "{{ route('admin.update.price1') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    price: val
                },
                success: function(res){
                    if (res == 1) {
                        $.notify({
                            title: "Perubahan : ",
                            message: "Harga telah di rubah",
                            icon: 'fa fa-check' 
                        },{
                            type: "success"
                        });
                    }
                },
                error : function(err){
                    console.log(err);
                }
            });
        }
    </script>
@endsection