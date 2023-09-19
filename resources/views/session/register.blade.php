@extends('layouts.user_type.auth')

@section('content')

    <div class="card-body px-10 pt-0 pb-2">
        <div class="card-header text-center pt-4">
            <h5>Register with</h5>
        </div>
        <div class="card-body">
            <form role="form text-left" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name"
                           aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                           id="email" aria-label="Email" aria-describedby="email-addon"
                           value="{{ old('email') }}">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password"
                           name="password" id="password" aria-label="Password"
                           aria-describedby="password-addon">
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-control" id="access_level" placeholder="Acesso" name="access_level">
                        <option value="0">Admin</option>
                        <option value="1">Secretaria</option>
                    </select>
                </div>
                @if(isset($message))
                    <p class="text-success text-xs mt-2">{{ $message }}</p>
                @endif
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

