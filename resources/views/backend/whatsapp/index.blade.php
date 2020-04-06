@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Whatsapp Setting</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-12">
                        <form action="#">
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
                                                <input type="number" class="form-control" value="{{ $ws }}" readonly>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button class="btn btn-primary">Perbaharui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection