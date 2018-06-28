@extends('layouts.app')

@section('content')
    <div class="container">
               
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-center">
                    <a href="{{ route( 'article.edit', $article->slug ) }}" class="btn btn-sm btn-info mr-4">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm">Delete</button>
                </div>
                <h2>{{ $article->title }}</h2>
                <p>By {{ $article->author->name }} on {{ $article->publish_at->format('jS \o\f F, Y') }}</p>
            </div>

            <div class="card-body">

                {!! $article->body !!}

            </div>
            
        </div>

    </div>

    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirmation" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmation">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2>Are you sure you want to delete this article?</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                    <button type="button" 
                        class="btn btn-danger" 
                        onclick="event.preventDefault(); document.getElementById('confirmation-approved').submit();"
                    >
                        Yes
                    </button>
                </div>
                <form id="confirmation-approved" action="{{ route('article.destroy', $article->slug) }}" method="POST" style="display: none;">
                    @method('delete')
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection
