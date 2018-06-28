@extends('layouts.app')

@section('content')
    <div class="container">

        <main class="card">

            <header class="card-header">
                <h1 class="d-flex justify-content-center">Welcome to Blogger</h1> 
            </header>

            <article class="card-body">
                @include('article.partials.list')    
            </article>

        </main>
        
    </div>
@endsection
