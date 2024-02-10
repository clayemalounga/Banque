@extends('layout.main')
@section('content')
<h3>New compte</h3>
<form method="POST" action="{{route('comptes.store')}}" >
      @csrf
      <div class="form-group mb-3">
          <label>Solde :</label>
          <input class="form-control" type="text" name="solde">
      </div>
      @error('solde')
        <span class="text-danger">{{$message}}</span>
      @enderror
    <div class="form-group mb-3">
        <label>Liste des clients</label>
        <select name="client_id" id="" class="form-control">
            @foreach ($clients as $c)
                <option value="{{$c->id}}">{{$c->nom}}</option>
            @endforeach
        </select>
    </div>
    @error('client_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <div class="form-group mb-3">
        <label>Liste des comptes</label>
        <select name="type_compte_id" id="" class="form-control">
            <option value="">Type</option>
            @foreach ($typeComptes as $type)
                <option value="{{$type->id}}">{{$type->label}}</option>
            @endforeach
        </select>
    </div>
    @error('compte_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
     <button class="btn btn-success mt-3" type="submit">Enregistrer</button>
</form>
@endsection