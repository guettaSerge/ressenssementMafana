@extends('rootprestationdepensebase')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des prestaions d'artiste</h2>
        </div>
        <div>
            <section class="contact-clean">
                <form method="get" action="/rechercheMultiLaptop">
                    @csrf
                    <h2 class="text-center">Recherche Multicritere</h2>
                    <label class="form-label">nom</label>
                    <input class="form-control" name="nom" type="text">
                    <label class="form-label">tarif</label>
                    <input class="form-control" name="tarif" type="number">
                    <p class="text-center text-danger">Aucun resultat</p>
                    <div class="text-center mb-3"><button class="btn btn-primary text-center" type="submit">Rechercher</button></div>
                </form>
            </section>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>idprestataire</th>
                    <th>idartiste</th>
                    <th>debut</th>
                    <th>fin</th>
                    <th>tarif</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestationdepensebase as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->idprestataire}}</td>
                    <td>{{$art->idartiste}}</td>
                    <td>{{$art->debut}}</td>
                    <td>{{$art->fin}}</td>
                    <td>{{$art->tarif}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/prestationdepensebase/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$prestationdepensebase->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
