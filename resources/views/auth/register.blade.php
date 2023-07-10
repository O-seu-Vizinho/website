@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Registar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="n_telemovel" class="col-md-4 col-form-label text-md-end">Numero de Telemóvel</label>

                            <div class="col-md-6">
                                <input id="n_telemovel" type="text" class="form-control" name="n_telemovel" required >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="data_nas" class="col-md-4 col-form-label text-md-end">Data de Nascimento</label>

                            <div class="col-md-6">
                                <input id="data_nas" type="date" class="form-control" name="data_nascimento" required >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="morada" class="col-md-4 col-form-label text-md-end">Morada</label>

                            <div class="col-md-6">
                                <input id="morada" type="text" class="form-control" name="morada" required >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="concelho" class="col-md-4 col-form-label text-md-end">Concelho</label>

                            <div class="col-md-6">
                                <input id="concelho" type="text" class="form-control" name="concelho" required >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="codigo_postal" class="col-md-4 col-form-label text-md-end">Código Postal</label>

                            <div class="col-md-6">
                                <input id="codigo_postal" type="text" class="form-control" name="codigo_postal" required>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
