@foreach( $articles as $article )

    <section class="card mt-4">

        <header class="card-header">

            <h2 class="card-title"><a href="{{ route( 'articles.show', $article->slug ) }}">{{ $article->title }}</a></h2>
            <p>By {{ $article->author->name }} on {{ $article->publish_at->format('jS \o\f F, Y') }}</p>
            
        </header>

        <article class="card-body">

            <p>{{ $article->overview }}</p>

        </article>
        
        <footer class="card-footer text-right">
            
            <a href="{{ route( 'articles.show', $article->slug ) }}" class="btn btn-sm btn-info">Read More</a>

        </footer>

    </section>

@endforeach