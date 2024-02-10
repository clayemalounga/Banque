@extends('layout.main')
@section('content')
    <a href="{{route('clients.create')}}" class="btn btn-primary mt-3" >Nouveau client</a>
    @if($mes = session('success'))
        <div class="alert alert-success mt-2">
            {{$mes}}
        </div>
    @endif
<h3 class="text-center text-primary">Liste des clients</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">CNI</th>
        <th scope="col">adresse</th>
        <th scope="col">date naissance</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr>
            <td>{{$client->nom}}</td>
            <td>{{$client->prenom}}</td>
            <td>{{$client->CNI}}</td>
            <td>{{$client->adresse}}</td>
            <td>{{$client->date_naissance}}</td>
            <td>
                <a href="{{route('clients.edit',$client->id)}}" class="btn btn-info">Modifier</a>
                <a href="{{route('clients.delete',$client->id)}}" onclick="return confirm('Are you sure')" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection
