@extends('layout.main')
@section('content')
<h3>New compte</h3>
<form method="POST" action="{{route('comptes.update',$compte->id)}}">
      @csrf
      <div class="form-group mb-3">
          <label>Solde :</label>
          <input class="form-control" type="text" name="solde" value="{{$compte->solde}}">
      </div>
      @error('solde')
        <span class="text-danger">{{$message}}</span>
      @enderror
    <div class="form-group mb-3">
        <label>Liste des clients</label>
        <select name="client_id" id="" class="form-control">
            @foreach ($clients as $c)
                @if ($compte->client_id == $c->id)
                    <option selected value="{{$c->id}}">{{$c->nom}} {{$c->prenom}}</option>
                @endif
                <option value="{{$c->id}}">{{$c->nom}} {{$c->prenom}}</option>
            @endforeach
           
        </select>
    </div>
    @error('client_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <div class="form-group mb-3">
        <label>Liste des comptes</label>
        <select name="type_compte_id" id="" class="form-control">
            @foreach ($typeCompte as $t)
                <option value="{{$t->id}}" @if($compte->type_compte_id == $t->id)
                    selected
                @endif >{{$t->label}}</option>
                <option value="{{$t->id}}">{{$t->label}}</option>
            @endforeach
        </select>
    </div>
    @error('compte_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
     <button class="btn btn-success mt-3" type="submit">Enregistrer</button>
</form>
@endsection