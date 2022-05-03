@extends('layouts.main')

@section('title', 'HDC Notices')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque uma Notícia</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="notices-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximas Notícias</h2>
    <p class="subtitle">Veja as próximas notícias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($notices as $notice)
        <div class="card col-md-3">
            <img src="/img/notices/{{ $notice->image }}" alt="{{ $notice->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($notice->date)) }}</p>
                <h5 class="card-title">{{ $notice->title }}</h5>
                <p class="card-participants">{{count($notice->users)}} Visitantes</p>
                <a href="/notices/{{ $notice->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($notices) == 0 && $search)
            <p>Não foi possível encontrar nenhuma notícia com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($notices) == 0)
            <p>Não há notícias disponíveis</p>
        @endif
    </div>
</div>

@endsection