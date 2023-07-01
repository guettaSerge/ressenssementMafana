@extends('rootprestation')
@section('content')
<div>
    <div id="listHeader">
        <div>
            <h2 class="text-center" style="font-size: 30px;">Liste des prestation</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>idprestateur</th>
                    <th>debut</th>
                    <th>fin</th>
                    <th>modifier</th>
                    <th>devis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestation as $art)
                <tr>
                    <td>{{$art->id}}</td>
                    <td>{{$art->idprestateur}}</td>
                    <td>{{$art->debut}}</td>
                    <td>{{$art->fin}}</td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/prestation/edit?id={{$art->id}}">&nbsp;modifier</a>
                    </td>
                    <td class="text-center" style="background: #ffffff;">
                        <a class="btn btn-success" href="/prestation/devis?id={{$art->id}}">&nbsp;devis</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <nav class="text-center" style="margin: 0 auto">
            {{$prestation->onEachSide(2)->links()}}
        </nav>
    </div>

</div>
@endsection
