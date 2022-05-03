@extends('layouts.main')

@section('title', $notice->title)

@section('content')


<div class="col-md-10 offset-md-1"> 
  <div class="row">
   <div id="image-container" class="col-md-6">
    <img src="/img/notices/{{ $notice->image }}" class="img-fluid" alt="{{ $notice->title }}">
   </div>
    <div id="info-container" class="col-md-6">
     <h1>{{ $notice->title }}</h1>
     <p class="notice-city"><ion-icon name="location-outline"></ion-icon>{{ $notice->city }}</p>
     <p class="notices-participants"><ion-icon name="people-outline"></ion-icon>{{count($notice->users) }} Visitantes</p>
     <p class="notice-owner"><ion-icon name="star-outline"></ion-icon>{{ $noticeOwner['name'] }}</p>
      @if(!$hasUserJoined)
      <form action="/notices/join/{{ $notice->id }}" method="POST">  
     @csrf
       <a href="/notices/join/{{ $notice->id }}" 
       class="btn btn-primary" 
       id="notice-submit"
       onclick="event.preventDefault();
       this.closest('form').submit();">
       Confirmar Presença
      </a>
    </form> 
      @else
      <p class="already-joined-msg">Você já confirmou sua presença a pagina!</p>
      @endif
    </div>
    <div class="col-md-12" id="description-container">
    <h3>Sobre a notícia:</h3>
    <p class="notice-description">{{ $notice->description }}</p>
    </div>
 </div>
</div>


@endsection