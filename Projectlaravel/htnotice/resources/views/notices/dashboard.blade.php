@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas notícias</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-notices-container">
    @if(count($notices) > 0)
    <table class="table">
        <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">Nome</th>
              <th scope="col">Visitantes</th>
              <th scope="col">Ações</th>
          </tr>
        </thead>
    <tbody>
        @foreach($notices as $notice)
        <tr>
            <td scropt="row">{{ $loop->index + 1 }}</td>
             <td><a href="/notices/{{ $notice->id }}">{{ $notice->title }}</a></td>
             <td>{{count($notice->users) }}</td>
             <td>
             <a href="/notices/edit/{{ $notice->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
            <form action="/notices/{{ $notice->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
   </table>
    @else
    <p>Você ainda não tem notícias, <a href="/notices/create">Criar uma Notícia</a></p>
    @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
     <h1>Notícias visitadas</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-notices-container">
     @if(count($noticesAsParticipant) > 0)
     <table class="table">
        <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">Nome</th>
              <th scope="col">Visitantes</th>
              <th scope="col">Ações</th>
          </tr>
        </thead>
    <tbody>
        @foreach($noticesAsParticipant as $notice)
        <tr>
            <td scropt="row">{{ $loop->index + 1 }}</td>
             <td><a href="/notices/{{ $notice->id }}">{{ $notice->title }}</a></td>
             <td>{{count($notice->users) }}</td>
             <td>
                 <form action="/notices/leave/{{ $notice->id }}" method="POST">
                   @csrf
                   @method("DELETE")
                   <button type="submit" class="btnt btn-danger delete-btn">
                     <ion-icon name="trash-outline"></ion-icon>Sair da Notícia  
                   </button>
                   </form>
                </td>
        </tr>
        @endforeach
    </tbody>
   </table> 
     @else
     <p>Você ainda não está presente, veja outras notícias, <a href="/">Veja todas as notícias</a> </p>
     @endif
   </div>
@endsection