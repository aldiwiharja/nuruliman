@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Whatsapp Setting</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-md-12">
                        @if(Session::has('msg'))
                            @section('script')
                                {!! Session::get('msg') !!}
                            @endsection
                        @endif
                        <form action="{{ route('admin.whatsapp.update') }}" method="POST">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admin / CS</th>
                                        <th>No Whatsapp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $value = json_decode($whatsapp_setting->value);
                                    @endphp
                                    @foreach ($value as $key => $ws)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>Admin {{ $key+1 }}</td>
                                            <td>
                                                <input type="number" class="form-control" name="contact[]" value="{{ $ws }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-block btn-primary">Perbaharui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection