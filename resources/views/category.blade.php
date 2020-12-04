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
            @include('partials.errors')

            @if($category->id)
            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
            {{ method_field('PUT') }}
            @else
            <form action="{{ route('categories.store') }}" method="POST">
            @endif

                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nome da categoria" value="{{ $category->name }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Descrição</label>
                        <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea >
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control  custom-switch">
                            @if($category->active)
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
                        <a href="{{ route('categories.index') }}" class="btn btn-block btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection