@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <div class="blocLog2" style="margin-top: 20px; padding: 10px;">
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('accountedit.save') }}" method="post" enctype="multipart/form-data">
            <div>
                <header><h3>First name</h3></header>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
            </div>
            <div>
                <label for="image">Image (only .jpg)</label>
                <input type="file" name="image" class="form-control" id="first_name">
            </div>
            <button type="submit" class="btn btn-primary">Save Account</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
            <div style="margin-bottom: 10px">
                <div style="background: url({{ route('accountedit.image',
                ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}) 50% 50%; background-size: cover;" class="img_user"></div>
            </div>
    @endif
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
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
@endsection