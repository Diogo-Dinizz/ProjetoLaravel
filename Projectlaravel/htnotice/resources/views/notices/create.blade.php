@extends('layouts.main')
        
        @section('title', 'Criar Notícias')

        @section('content')

       <div id="notice-create-container" class="col-md-6 offset-md-3">
        <h1>Crie sua notícia</h1>
         <form action="/notices" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
           <label for="image">Imagem da notícia:</label>
           <input type="file"  class="form-control-file" id="image" name="image">
            </div>
          <div class="form-group">
           <label for="title">Notícia:</label>
           <input type="text" class="form-control" id="title" name="title" placeholder="Nome da Notícia"> 
            </div>
            <div class="form-group">
              <label for="date">Data da Notícia:</label>  
              <input type="date" class="form-control" id="date" name="date"> 
            </div>
          <div class="form-group">
            <label for="title">Cidade:</label>
             <input type="text" class="form-control" id="city" name="city" placeholder="Local da Notícia"> 
            </div>
          <div class="form-group">
             <label for="title">A notícia é recente?</label>
              <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>  
              </select> 
            </div>
            <div class="form-group">
              <label for="title">Descrição:</label>
              <textarea name="description" id="description" class="form-control" placeholder="Principais pontos da notícia"></textarea>
            </div>
             <input type="submit" class="btn btn-primary" value="Criar Notícia">
         </form>
        </div>
    @endsection