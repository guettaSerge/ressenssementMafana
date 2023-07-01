@extends('rootprestation')
@section('content')
<div>
    <div>
        <div id="listHeader">
            <h1 class="text-center">Fiche prestation</h1>
            <div id="headingFirst">
                <h2 class="text-center" style="font-size: 30px;"></h2>
            </div>
            <div class="float-end" id="headingLast"></div>
        </div>
        <div class="table-responsive">
            <h2 class="text-center">Fiche prestation estimation</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>titre</th>
                        <th>prestateur</th>
                        <th>debut</th>
                        <th>fin</th>
                        <th>recette</th>
                        <th>depense</th>
                        <th>resultat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$prestation->id}}</td>
                        <td>{{$prestation->titre}}</td>
                        <td>{{$prestation->idprestateur}}</td>
                        <td>{{$prestation->debut}}</td>
                        <td>{{$prestation->fin }}</td>
                        <td>{{$prestation->recette()}}</td>
                        <td>{{$prestation->depensetotal()}}</td>
                        <td>{{$prestation->resultat()}}</td>

                    </tr>
                </tbody>
            </table>
        </div><a class="btn btn-primary" href="/prestation/pdfpage?idprestation={{$prestation->id}}">&nbsp;affiche en pdf</a>
        </div>
        <div class="table-responsive">
            <h2 class="text-center">Fiche prestation reeel</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>titre</th>
                        <th>prestateur</th>
                        <th>debut</th>
                        <th>fin</th>
                        <th>recette</th>
                        <th>depense</th>
                        <th>resultat avanttaxe</th>
                        <th>valeur taxe</th>
                        <th>resultat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$prestation->id}}</td>
                        <td>{{$prestation->titre}}</td>
                        <td>{{$prestation->idprestateur}}</td>
                        <td>{{$prestation->debut}}</td>
                        <td>{{$prestation->fin }}</td>
                        <td>{{$prestation->recettereel()}}</td>
                        <td>{{$prestation->depensetotalReel()}}</td>
                        <td>{{number_format($prestation->resultatavanttaxe(),2)}}</td>
                        <td>{{number_format($prestation->valeurtaxe(),2)}}</td>
                        <td>{{number_format($prestation->resultatreel(),2)}}</td>

                    </tr>
                </tbody>
            </table>
        </div><a class="btn btn-primary" href="/prestation/pdfpage?idprestation={{$prestation->id}}">&nbsp;affiche en pdf</a>
        </div><a class="btn btn-primary" href="/prestation/deviscamambert?id={{$prestation->id}}">&nbsp;graphe</a>
        </div><a class="btn btn-primary" href="/prestation/bis?id={{$prestation->id}}">&nbsp;bis</a>
        </div>
    </div>
    <div class="table-responsive">
        <h1 class="text-center">Depenses</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>lieu</th>
                    <th>artiste</th>
                    <th>depense base</th>
                    <th>autre depense</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$prestation->depenseLieu()}}</td>
                    <td>{{$prestation->depenseartiste()}}</td>
                    <td>{{$prestation->depensedepbase()}}</td>
                    <td>{{$prestation->depenseautredep()}}</td>
                    <td>{{$prestation->depensetotal()}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <div>
        <div id="listHeader-3">
            <h1 class="text-center">Artiste</h1>
            <div id="headingFirst-3">
                <h2 class="text-center" style="font-size: 30px;"></h2>
            </div>
            <div class="float-end" id="headingLast-3"></div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>duree</th>
                        <th>tarif</th>
                        <th>total</th>
                        <th>Voir Detail</th>
                        <th>supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestation->artiste as $art)
                    <tr>
                        <td>{{$art->nom}}</td>
                        <td>{{$art->duree}}</td>
                        <td>{{$art->tarif}}</td>
                        <td>{{$art->nom}}</td>
                        <td>
                            <a class="btn btn-success" href="/prestationartiste/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="/prestationartiste/delete?id={{$art->id}}">&nbsp;supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><a class="btn btn-primary" href="/prestationartiste/create?idprestation={{$prestation->id}}">&nbsp;ajouter</a>
    </div>
    <div>
        <div id="listHeader-2">
            <h1 class="text-center">Dépense de base</h1>
            <div id="headingFirst-2">
                <h2 class="text-center" style="font-size: 30px;"></h2>
            </div>
            <div class="float-end" id="headingLast-2"></div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>duree</th>
                        <th>tarif</th>
                        <th>total</th>
                        <th>Voir Detail</th>
                        <th>supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestation->depensebase as $art)
                    <tr>
                        <td>{{$art->nom}}</td>
                        <td>{{$art->duree}}</td>
                        <td>{{$art->tarif}}</td>
                        <td>{{$art->nom}}</td>
                        <td>
                            <a class="btn btn-success" href="/prestationdepensebase/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="/prestationdepensebase/delete?id={{$art->id}}">&nbsp;supprimer</a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div></div><a class="btn btn-primary" href="/prestationdepensebase/create?idprestation={{$prestation->id}}">&nbsp;ajouter</a>
    </div>
    <div>
        <div id="listHeader-1">
            <h1 class="text-center">autre dépense</h1>
            <div id="headingFirst-1">
                <h2 class="text-center" style="font-size: 30px;"></h2>
            </div>
            <div class="float-end" id="headingLast-1"></div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>tarif</th>
                        <th>Voir Detail</th>
                        <th>supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestation->autredepense as $art)
                    <tr>
                        <td>{{$art->nom}}</td>
                        <td>{{$art->tarif}}</td>
                        <td>
                            <a class="btn btn-success" href="/prestationautredepense/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="/prestationautredepense/delete?id={{$art->id}}">&nbsp;supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><a class="btn btn-primary" href="/prestationautredepense/create?idprestation={{$prestation->id}}">&nbsp;ajouter</a>
    </div>
    <div>
        <div id="listHeader-1">
            <h1 class="text-center">lieu</h1>
            <div id="headingFirst-1">
                <h2 class="text-center" style="font-size: 30px;"></h2>
            </div>
            <div class="float-end" id="headingLast-1"></div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>tarif</th>
                        <th>tarifplacenormal</th>
                        <th>tarifplacereserve</th>
                        <th>tarifplacevip</th>
                        <th>placenormal vendu</th>
                        <th>placereserve vendu</th>
                        <th>placevip vendu</th>
                        <th>Voir Detail</th>
                        <th>supprimer</th>
                        <th>vendrechaise</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestation->lieu as $art)
                    <tr>
                        <td>{{$art->nom}}</td>
                        <td>{{$art->tarif}}</td>
                        <td>{{$art->tarifplacenormal}}</td>
                        <td>{{$art->tarifplacereserve}}</td>
                        <td>{{$art->tarifplacevip}}</td>
                        <td>{{$art->placenormalvendu}}</td>
                        <td>{{$art->placereservevendu}}</td>
                        <td>{{$art->placevipvendu}}</td>
                        <td class="text-center" style="background: #ffffff;">
                            <a class="btn btn-success" href="/prestationlieu/edit?id={{$art->id}}&& idprestation={{$prestation->id}}">&nbsp;modifier</a>
                        </td>
                        <td class="text-center" style="background: #ffffff;">
                            <a class="btn btn-success" href="/prestationlieu/delete?id={{$art->id}}&& idprestation={{$prestation->id}}">&nbsp;supprimer</a>
                        </td>
                        <td class="text-center" style="background: #ffffff;">
                            <a class="btn btn-success" href="/prestationlieu/ventechaise?id={{$art->id}}&& idprestation={{$prestation->id}}">&nbsp;vendre chaise</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><a class="btn btn-primary" href="/prestationlieu/create?idprestation={{$prestation->id}}">&nbsp;ajouter</a>
    </div>
</div>
@endsection

