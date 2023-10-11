@extends('layouts.user_type.auth')
@section('content')
    <div class="card-body px-10 pt-0 pb-2">
        <div class="card-header text-center pt-4">
            <h5>Nova Tag </h5>
        </div>
        <div class="card-body">
            <form role="form" method="POST" action="/create-status" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="status" name="status">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>

@endsection
