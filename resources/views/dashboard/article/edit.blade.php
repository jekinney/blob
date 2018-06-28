@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">

                    <header class="card-header">
                        <h1 class="card-title">Update an article</h1>
                    </header>

                    <form action="{{ route( 'article.update', $article->slug ) }}" method="post" class="card-body">
                        @method('patch')
                        @csrf
                        
                        <div class="row">

                            <div class="col">
                                <label for="slug">Slug</label>
                                <input type="text" 
                                    name="slug" 
                                    id="slug" 
                                    value="{{ old('slug')?? $article->slug }}" 
                                    class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                >

                                @if( $errors->has('slug') )
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif

                            </div>
                            
                            <div class="col">
                                <label for="publish_at">Publish Date</label>
                                <input type="text" 
                                    name="publish_at" 
                                    id="publish_at" 
                                    value="{{ old('publish_at')?? $article->publish_at->format( 'm-d-Y' ) }}" 
                                    class="form-control {{ $errors->has('publish_at') ? ' is-invalid' : '' }}"
                                >

                                @if( $errors->has('publish_at') )
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('publish_at') }}</strong>
                                    </span>
                                @endif

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" 
                                name="title" 
                                id="title" 
                                value="{{ old('title')?? $article->title }}" 
                                class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                            >

                            @if( $errors->has('title') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="overview">Overview</label>
                            <input type="text" 
                                name="overview" 
                                id="overview" 
                                value="{{ old('overview')?? $article->overview }}" 
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            >

                            @if( $errors->has('overview') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('overview') }}</strong>
                                </span>
                            @endif

                        </div>
                        
                        <div class="form-group">
                            <label for="body">Body</label>
                            <editor data="{{ old('body')?? $article->body }}" />

                            @if( $errors->has('body') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
