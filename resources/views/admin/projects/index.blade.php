@extends('layouts.admin')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <button type="button" class="btn btn-primary">
                    <a href="{{ route('admin.projects.create') }}" class="link-underline link-underline-opacity-0 link-light">
                        Aggiungi Progetto
                    </a>
                </button>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Azienda</th>
                      <th scope="col">Nome progetto</th>
                      <th scope="col">Data di creazione</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($projects as $project)
                    <tr>
                      <td>{{ $project->id }}</td>
                      <td>{{ $project->azienda }}</td>
                      <td>{{ $project->nome_progetto }}</td>
                      <td>{{ $project->data_di_creazione }}</td>
                      <td>
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('admin.projects.show', ['project' => $project]) }}" class="link-underline link-underline-opacity-0 link-light">
                                <i class="fas fa-eye"></i>
                            </a>
                        </button>
                        <form action="{{ route('admin.projects.destroy', ['project' => $project]) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can"></i></button>
                        </form>
                        <button type="button" class="btn btn-warning"><a href="{{ route('admin.projects.edit', ['project' => $project]) }}" class="link-underline link-underline-opacity-0 link-dark"><i class="fas fa-pen"></i></a></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection