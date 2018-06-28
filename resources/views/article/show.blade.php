@extends('layouts.app')

@section('content')
    <div class="container">
                
        <main class="card">

            <header class="card-header">
                <h1 class="card-title">{{ $article->title }}</h1>
                <p>By {{ $article->author->name }} on {{ $article->publish_at->format('jS \o\f F, Y') }}</p>
            </header>

            <article class="card-body">

                {!! $article->body !!}

            </article>
            
        </main>

    </div>
@endsection
