@extends('root')
@section('content')
<section class="contact-clean">
    <form class="text-center" method="post" action="/login">
        @csrf
        <h2 class="text-center">Connection</h2>
        <div class="mb-3"><label class="form-label">Email
            </label><input class="form-control" type="email" name="email" placeholder="Email">
            @if ($errors->has('email'))
            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="mb-3"><label class="form-label">Mot de Passe</label>
            <input class="form-control" type="passe" name="passe" placeholder="passe">
            @if ($errors->has('passe'))
            <small class="form-text text-danger">{{ $errors->first('passe') }}</small>
            @endif
        </div>
        <small class="form-text text-danger">{{ $error }}</small>
        <div class="mb-3"></div>
        <div class="text-center mb-3"><button class="btn btn-primary" type="submit">Connection</button></div>
        <div class="text-center"><a class="text-start" href="/inscription">creer un compte</a></div>
    </form>
</section>
@endsection
