@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card"> 

                    <header class="card-header d-flex justify-content-between align-items-center">

                        <h1 class="card-title">All Articles</h1>

                        <a href="{{ route( 'article.create' ) }}" class="btn btn-info">+ Add</a>

                    </header>

                    <section class="card-body">

                        @foreach( $articles as $article )

                            <div class="card mt-4">

                                <div class="card-header">

                                    <h2 class="card-title">{{ $article->title }}</h2>
                                    <p>By {{ $article->author->name }} on {{ $article->publish_at->format('jS \o\f F, Y') }}</p>
                                    
                                </div>

                                <div class="card-body">

                                    <p>{{ $article->overview }}</p>

                                </div>
                                
                                <div class="card-footer text-right">
                                    
                                    <a href="{{ route( 'article.edit', $article->slug ) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route( 'article.show', $article->slug ) }}" class="btn btn-sm btn-success">Show</a>
                                    
                                </div>

                            </div>

                        @endforeach
                    
                    </section>

                </div>

            </div>  
        </div>
    </div>
@endsection
