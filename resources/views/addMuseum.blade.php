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

                    <form method="post" enctype="multipart/form-data" action="{{ route('uploadMap') }}">
                        @csrf
                        <div class="form-group row">
                            Select image to upload:
                            <input type="file" name="mapFile" id="mapFile">
                            <input type="submit" class="btn btn-primary text-center" value="Upload Image" name="submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
