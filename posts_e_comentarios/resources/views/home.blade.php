@extends('layouts.app')

@section('style')
    <style>
        .col-12{
            margin:10px 0;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @auth
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="card-header">Criar nova postagem</div>
                        <div class="card-body">
                            <label for="conteudo">Postagem</label>
                            <textarea name="conteudo" id="conteudo" rows="10" cols="80" ></textarea>
                        </div>
                        <div class="card-footer d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endauth
        @for($i = 0; $i < count($posts);$i++)
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">Título da postagem</div>
                <div class="card-body">
                    <h5>Autor: <small>{{$posts[$i]->name}}</small></h5>
                    <p>
                        Texto com o conteúdo da postagem<br>
                       {{$posts[$i]->content}}
                    </p>
                    <hr>
                    <a href="#comentarios-1" data-toggle="collapse" aria-expanded="false" aria-controls="comentarios-1">
                        <small>
                            comentários ({{count($comments[$i])}})
                        </small>
                    </a>
                    @for($j = 0; $j < count($comments[$i]);$j++)
                        <div class="my-2 comentarios collapse" id="comentarios-1">
                            -({{$comments[$i][$j]->name}})
                                 {{$comments[$i][$j]->content}}
                            
                        </div>
                    @endfor
                    @auth
                        <hr>
                        <div>
                            <form action="{{ route('comentario.store',$posts[$i]->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="postagem" value={{$posts[$i]->id}}>
                                <div class="form-group">
                                    <label for="comentario">Comentario</label>
                                    <textarea name="comentario" id="comentario" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Salvar comentário</button>
                            </form>
                        </div>    
                    @endauth
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection

@section('script')
    <script>
        window.onload = function(){ 
            CKEDITOR.replace('conteudo')
            CKEDITOR.config.height = 100;
        }
    </script>
@endsection