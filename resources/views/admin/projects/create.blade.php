@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-9 my-5">
            @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label for="" class="control-label">Azienda</label>
                    <input type="text" class="form-control" id="azienda" name="azienda" placeholder="Azienda">
                </div>
                <div class="form-group my-2">
                    <label for="" class="control-label">Nome Progetto</label>
                    <input type="text" class="form-control" id="nome_progetto" name="nome_progetto" placeholder="Nome Progetto">
                </div>
                <div class="form-group my-2">
                    <label for="" class="control-label">Descrizione</label>
                    <textarea class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione"></textarea>
                </div>
                <div class="form-group my-2">
                    <label for="" class="control-label">Passaggi</label>
                    <textarea class="form-control" id="passaggi" name="passaggi" placeholder="Passaggi"></textarea>
                </div>
                <div class="form-group my-2">
                    <label for="" class="control-label">Data di Creazione</label>
                    <input type="date" class="form-control" id="data_di_creazione" name="data_di_creazione" placeholder="Data di Creazione">
                </div>
                <div class="form-group my-2">
                    <h6 for="" class="control-label">Tipo</h6>
                    @foreach ($types as $type)
                    <input type="radio" value="{{$type->id}}" name = "type_id" id="{{$type->id}}">
                    <label for="{{$type->id}}">{{$type->type}}</label>
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <h6 class="control-label">Tecnologia</h6>
                    @foreach ($tecnologies as $tecnology)
                    <input type="checkbox" value="{{$tecnology->id}}" name="technologies[]" id="{{$tecnology->id}}">
                    <label for="{{$tecnology->id}}">{{$tecnology->tecnology}}</label>
                    @endforeach
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Logo</label>
                  <input class="form-control" type="file" id="thumb" name="thumb">
                </div>
                <div class="form-group my-2 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Aggiungi Progetto</button>
                    <a class="btn btn-md btn-primary" href="{{route('admin.projects.index')}}">Torna alla home</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection