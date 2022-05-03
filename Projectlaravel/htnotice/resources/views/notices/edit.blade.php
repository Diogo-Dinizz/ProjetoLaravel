@extends('layouts.main')
        
        @section('title', 'Editando: ' . $notice->title)

        @section('content')

       <div id="notice-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $notice->title }}</h1>
         <form action="/notices/update/{{ $notice->id }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT') 
             <div class="form-group">
              <label for="image">imagem da Notícia:</label>
              <input type="file" id="image" name="image" class="form-control-file" >
              <img src="/img/notices/{{ $notice->image }}" alt="{{ $notice->title }}" class="img-preview">
            </div>
          <div class="form-group">
           <label for="title">Notícia:</label>
           <input type="text" class="form-control" id="title" name="title" placeholder="Nome da Notícia" value="{{ $notice->title }}"> 
            </div>
            <div class="form-group">
              <label for="date">Data da Notícia:</label>  
              <input type="date" class="form-control" id="date" name="date" value="{{ $notice->date->format('Y-m-d') }}"> 
            </div>
          <div class="form-group">
            <label for="title">Cidade:</label>
             <input type="text" class="form-control" id="city" name="city" placeholder="Local da Notícia" value="{{ $notice->city }}"> 
            </div>
          <div class="form-group">
             <label for="title">A notícia é confidencial?</label>
              <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1"{{ $notice->private == 1 ? "selected='selected'" : "" }}>Sim</option>  
              </select> 
            </div>
            <div class="form-group">
              <label for="title">Descrição:</label>
              <textarea name="description" id="description" class="form-control" placeholder="Principais pontos da notícia">{{ $notice->description }}</textarea>
            </div>
             <input type="submit" class="btn btn-primary" value="Editar Notícia">
         </form>
        </div>
    @endsection