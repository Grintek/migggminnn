@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')

    <p>{{ route('vkaut') }}</p>
    <p>{{ $getVk }}</p>
    <?php
    echo $_GET['email'];
    ?>
@endsection
