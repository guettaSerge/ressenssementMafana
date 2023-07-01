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

            <h2 class="text-center">Fiche prestation reeel</h2>
            <table class="table">
                <thead>
                    <tr id="label">
                        <th>depense artiste</th>
                        <th>depense lieu</th>
                        <th>autre depense</th>
                        <th>depense de base</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="data">
                        <td>{{$prestation->depenseartiste()}}</td>
                        <td>{{$prestation->depenseLieu()}}</td>
                        <td>{{$prestation->depenseautredep()}}</td>
                        <td>{{$prestation->depensedepbase()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <canvas id="pieChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Récupérer la référence à l'élément <canvas>
var ctx = document.getElementById('pieChart').getContext('2d');

// Créer le diagramme de fromageµ
            var x=document.getElementById("data").querySelectorAll("td");
            var y=document.getElementById("label").querySelectorAll("th");
            var don=[];
            var titre=[];
            x.forEach(element => {
                don.push(element.innerHTML);
            });
            y.forEach(element => {
                titre.push(element.innerHTML);
            });
            
            var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: titre, // Les étiquettes pour chaque tranche
                datasets: [{
                label: titre,
                data: don, // Les valeurs pour chaque tranche
                borderWidth: 1 // Largeur de la bordure des tranches
                }]
            },
            options: {
                responsive: true, // Rendre le diagramme adaptatif
                maintainAspectRatio: false // Ne pas conserver le ratio d'aspect
            }
            });

            </script>

        </div>
    </div>

</div>
@endsection

