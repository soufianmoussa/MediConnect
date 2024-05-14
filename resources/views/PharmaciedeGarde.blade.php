@extends("layouts.master")
@section('title','MediConnect-Pharmacie de grade')
@section("main")
  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Pharmacie De Garde</h1>
</div>
<!-- Single Page Header End -->
<br><br><br>
<table class="table">
    <thead>
        <tr>
            <th>Nom de la pharmacie</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Date de garde</th>
        </tr>
    </thead>
    <tbody class="table-hover">
        @foreach($gardes as $garde)
            <tr>
                <td><a href="{{route('pharmacie',['nom_pharmacie'=>$garde->pharmacie->nom_pharmacie])}}">{{ $garde->pharmacie->nom_pharmacie }}</a></td>
                <td>{{ $garde->pharmacie->adresse }}</td>
                <td>{{ $garde->pharmacie->Telephone }}</td>
                <td>{{ $garde->la_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection