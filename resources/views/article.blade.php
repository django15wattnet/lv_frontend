@extends('app')

@section('title')
    Artikel: {{ $article->title }}
@endsection

@section('content')
<article>
    <h1>{{ $article->title }}</h1>
    <div class="subTitle pl-12 mb-12">
        {!! $article->subTitle !!}
    </div>
    <div class="body">
        {!! $article->body !!}
    </div>
    <div class="url mt-6 pl-12">
        <a
            href="{{ $article->link }}"
            target="_blank"
            title="Externer Link zu: {{ $article->title }}"
        ><span>Link</span> ⧉</a>
    </div>
</article>

<div class="mt-6">
    <a
        href="{{ route('articleList', ['listPage' => $listPage]) }}"
    >←<span>Zurück zur Liste</span></a>
</div>
@endsection
