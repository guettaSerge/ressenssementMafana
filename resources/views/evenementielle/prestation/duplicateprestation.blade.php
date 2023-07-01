@extends('rootprestation')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">duplicate prestation</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/prestation/bis">
                    @csrf
                    <input class="form-control" type="hidden" name="idAncien" value="{{$prestation->id}}">
                    <input class="form-control" type="hidden" name="titreAncien" value="{{$prestation->titre}}">

                    <label class="form-label">debut</label>
                    <input class="form-control" type="datetime-local" name="debut">
                    <div>@if ($errors->has('debut'))
                        <small class="form-text text-danger">{{ $errors->first('debut') }}</small>
                    @endif </div>

                    <label class="form-label">fin</label>
                    <input class="form-control" type="datetime-local" name="fin">
                    <div>@if ($errors->has('fin'))
                        <small class="form-text text-danger">{{ $errors->first('fin') }}</small>
                    @endif </div>


                    <p class="text-danger">{{$error}}</p>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="text-center mb-3"></div><button class="btn btn-primary" type="submit">dupliquer</button></div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection

