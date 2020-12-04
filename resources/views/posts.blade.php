@extends('partials.layout')

@section('content')
@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Postagens</h1>
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Texto</th>
                    <th>Categoria</th>
                    <th>Data da Postagem</th>
                    <th>Ativada?</th>
                    <th>Ações</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->summary }}</td>
                        <td>{{ $post->text }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>{{ ($post->active) ? 'Sim' : 'Não' }}</td>
                        
                        <td>
                            <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="btn-group">
                                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info">Editar</a>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                            </form>
                        </td>  
                    </tr>
                @endforeach
            </table>
            <div class="row justify-content-center">
                <a href="{{ route('posts.create') }}" class="btn btn-dark">Inserir</a>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection