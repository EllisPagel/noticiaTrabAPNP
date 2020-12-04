@extends('partials.layout')

@section('content')
@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Categorias</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ativada?</th>
                    <th>Ações</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ ($category->active) ? 'Sim' : 'Não' }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="btn-group">
                                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info">Editar</a>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                            </form>
                        </td>  
                    </tr>
                    
                @endforeach
            </table>
            <div class="row justify-content-center">
                <a href="{{ route('categories.create') }}" class="btn btn-dark">Inserir</a>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection