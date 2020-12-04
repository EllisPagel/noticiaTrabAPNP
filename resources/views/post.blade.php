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
            @include('partials.errors')

            @if($post->id)
            <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @else
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @endif

                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Digite o título da postagem" value="{{ $post->title }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="summary">Resumo</label>
                        <input type="text" name="summary" id="summary" class="form-control" placeholder="Digite o resumo da postagem" value="{{ $post->summary }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Selecione...</option>
                            @foreach($categories as $category)
                                @if($category->active == 1)
                                    @if($category->id == $post->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="post_date">Data</label>
                        <input type="date" name="post_date" id="post_date" class="form-control" placeholder="Digite a data da postagem" value="{{ $post->post_date }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Texto</label>
                        <textarea name="text" id="text" rows="8" class="form-control" placeholder="Digite a postagem">{{ $post->text }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="custom-control  custom-switch">
                        @if($post->active)
                            <input type="checkbox" name="active" id="active" class="custom-control-input" value="1" checked>
                        @else
                            <input type="checkbox" name="active" id="active" class="custom-control-input" value="1">
                        @endif
                        <label for="active" class="custom-control-label">Ativar?</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-info">Salvar</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-block btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection