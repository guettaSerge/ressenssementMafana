@extends('roottaxe')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des taxes</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>pere famille</th>
                    <th>date du payement</th>
                    <th>montant</th>
                    <th>modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taxe as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->pourcentage}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/taxe/edit?id={{$art->id}}">&nbsp;modifier</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$taxe->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
