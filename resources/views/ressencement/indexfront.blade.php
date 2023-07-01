@extends('rootfrontoffice')
@section('content')
    <div>
        <div id="listHeader">
            <h1 class="text-center">Fiche prestation</h1>
            <div id="headingFirst">
                <h2 class="text-center" style="font-size: 30px;"></h2>
            </div>
            <div class="float-end" id="headingLast"></div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>prestateur</th>
                        <th>debut</th>
                        <th>fin</th>
                        <th>recette</th>
                        <th>depense</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2234 TBG</td>
                        <td>Mercedes</td>
                        <td>Sprinter</td>
                        <td>Bus</td>
                        <td>Bus</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
