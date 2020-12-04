@extends('partials.layout')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
            <div class="d-flex flex-row-reverse">
                    <a href="{{ route('login') }}" class="btn btn-dark">Logar</a>
                </div>
                <br>
                <h1>Notícias</h1>
                <lead>Aqui estão as últimas notícias postadas:</lead>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
            <table class="table table-hover">
                <tr>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Texto</th>
                    <th>Categoria</th>
                    <th>Data da Postagem</th>
                </tr>
                
                @foreach($posts as $post)
                    @if($post->active == 1)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->summary }}</td>
                            <td>{{ $post->text }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->post_date }}</td>
                        </tr>
                    @endif
                @endforeach
                
            </table>
            </div>
        </div>
        <br>
    </div>
@endsection
