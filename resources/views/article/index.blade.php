@extends('layouts.app')

@section('content')
    <div class="container">

        <main class="card">

            <header class="card-header">
                <h1 class="d-flex justify-content-center">All Blogger's Articles</h1> 
                <div class="d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
            </header>

            <article class="card-body">
                @include('article.partials.list')    
            </article>
            
            <footer class="card-footer d-flex justify-content-center">
                {{ $articles->links() }}
            </footer>

        </main>
        
    </div>
@endsection
