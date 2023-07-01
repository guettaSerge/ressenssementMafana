@extends('rootautredepense')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des Autre depenses</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>tarif</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autredepense as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->nom}}</td>
                    <td>{{$art->tarif}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/autredepense/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$autredepense->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
