@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header><h3>What do you have to say?</h3></header>
        <form action="{{ route('post.create') }}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your post"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>
    </div>
</section>
    <section class="row">
        <div class='col-md-6 col-md-offset-3'>
            <header><h3>What othe people say...</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis,
                    eligendi repella minus obcaecati quia quisquam sit.</p>
                <div class="info">
                    Posted by Max on 12 fed 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis,
                    eligendi repella minus obcaecati quia quisquam sit.</p>
                <div class="info">
                    Posted by Max on 12 fed 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
@endsection