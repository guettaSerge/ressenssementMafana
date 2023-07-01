@extends('rootprestationlieu')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Modifier prestation d'lieu </h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/prestationlieu/update>
                    @csrf
                    <input type="hidden" name="id" value="{{$prestationlieu->id}}">
                    <label class="form-label">placenormalvendu</label>
                    <input class="form-control" type="number" name="placenormalvendu" value="{{$prestationlieu->placenormalvendu}}">
                    <div>@if ($errors->has('placenormalvendu'))
                        <small class="form-text text-danger">{{ $errors->first('placenormalvendu') }}</small>
                    @endif </div>
                    <label class="form-label">placereservevendu</label>
                    <input class="form-control" type="number" name="placereservevendu" value="{{$prestationlieu->placereservevendu}}">
                    <div>@if ($errors->has('placereservevendu'))
                        <small class="form-text text-danger">{{ $errors->first('placereservevendu') }}</small>
                    @endif </div>
                    <label class="form-label">placevipvendu</label>
                    <input class="form-control" type="number" name="placevip" value="{{$prestationlieu->placevip}}">
                    <div>@if ($errors->has('placevip'))
                        <small class="form-text text-danger">{{ $errors->first('placevip') }}</small>
                    @endif </div>

                    <p class="text-danger">{{$error}}</p>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="text-center mb-3"></div><button class="btn btn-primary" type="submit">Ajouter</button></div>

                    <p class="text-danger">{{$error}}</p>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="text-center mb-3"></div><button class="btn btn-primary" type="submit">Ajouter</button></div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection

