@extends('layout.main')
@section('content')
    <a href="{{route('comptes.create')}}" class="btn btn-primary mt-3" >Nouveau compte</a>
    @if($mes = session('success'))
        <div class="alert alert-success mt-2">
            {{$mes}}
        </div>
    @endif
<h3 class="text-center text-primary">Liste des comptes</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Solde du compte</th>
        <th scope="col">Nom complet du client</th>
        <th scope="col">Type de compte</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comptes as $compte)
        <tr>
            <td>{{$compte->solde}}</td>
            <td>{{$compte->client->nom}} {{$compte->client->prenom}}</td>
            <td>{{$compte->typeCompte->label}}</td>
            <td>
                <a href="{{route('comptes.edite',$compte->id)}}" class="btn btn-info">Modifier</a>
                <a href="{{route('comptes.delete',$compte->id)}}" onclick="return confirm('Are you sure')" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection
