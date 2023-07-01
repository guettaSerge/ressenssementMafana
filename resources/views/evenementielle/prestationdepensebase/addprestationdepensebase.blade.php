@extends('rootprestationdepensebase')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Ajout de prestation depense de base</h2>
            <section class="contact-clean">
                <form class="text-center" method="post" action="/prestationdepensebase">
                    @csrf
                    <label class="form-label">Depense base</label>
                    <select class="form-control" name="iddepensebase" >
                        @foreach ($depensebase as $art)
                        <option value="{{$art->id}}">{{$art->nom}}</option>
                        @endforeach
                    </select>
                    <div>@if ($errors->has('idartiste'))
                        <small class="form-text text-danger">{{ $errors->first('idartiste') }}</small>
                    @endif </div>

                    <label class="form-label">duree</label>
                    <input class="form-control" type="number" name="duree">
                    <div>@if ($errors->has('duree'))
                        <small class="form-text text-danger">{{ $errors->first('duree') }}</small>
                    @endif </div>

                    <label class="form-label">type prestation</label>
                    <select class="form-control" name="typeprestation" >
                        <option value="0">standart</option>
                        <option value="1">premium</option>
                    </select>

                    <label class="form-label">idprestation</label>
                    <input class="form-control" type="number" name="idprestation" value="{{$idprestation}}">
                    <div>@if ($errors->has('idprestation'))
                        <small class="form-text text-danger">{{ $errors->first('idprestation') }}</small>
                    @endif </div>

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

