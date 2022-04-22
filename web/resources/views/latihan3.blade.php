{{-- @dd($p) --}}

@extends('layouts/mainLatihan')
@section('isi konten latihan')

    @foreach ($p as $p )
    <article class="mb-5">
        <div class="h1"> {{ $p['judul post'] }} </div>
        <div class="h5">by: {{ $p['author'] }} </div>
        <p>{{ $p['body'] }}</p>
    </article>
    @endforeach

@endsection
