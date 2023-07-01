@extends('rootlieu')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des lieu</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>nombre personne</th>
                    <th>type</th>
                    <th>tarif</th>
                    <th>detail</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lieu as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td>{{$art->nbrepers}}</td>
                    <td>{{$art->nomtype}}</td>
                    <td>{{$art->tarif}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/lieu/show?id={{$art->id}}">&nbsp;detail</a>
                    </td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/lieu/edit?id={{$art->id}}">&nbsp;modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$lieu->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
