@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
{{ $govno }}
<script>
    window.location.href = window.location.href.replace("#","?");

</script>
@endsection
