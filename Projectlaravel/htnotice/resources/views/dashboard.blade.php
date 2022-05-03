@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas notícias</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-notices-container">
    @if(count($notices) -> 0)
    @else
    <p>Você ainda não tem notícias, <a href="/notices/create"></a></p>
    @endif
</div>
@endsection