@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Download</th>
                          <th scope="col">QR code</th>
                          @if (Auth::check())
                            <th scope="col">Delete</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($museums as $museum)
                          <tr>
                            <th scope="row">{{$museum->id}}</th>
                            <td>{{$museum->name}}</td>
                            <td>
                                <form action="{{ route('downloadMap') }}" action="get">
                                    <input type="hidden" name="id" value="{{$museum->id}}">
                                    <button type="submit" class="btn btn-default" value="route">
                                        Download
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('generateQR') }}" action="get">
                                    <input type="hidden" name="id" value="{{$museum->id}}">
                                    <button type="submit" class="btn btn-primary">
                                        Generate
                                    </button>
                                </form>
                            </td>
                            @if (Auth::check())
                                <td>
                                    <button type="submit" class="btn btn-danger">
                                        X
                                    </button>
                                </td>
                            @endif
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
