@extends('app')

@section('title')
Liste aller Artikel
@endsection

@section('content')
<h1>Liste aller Artikel</h1>
<div class="listArticleOuter">
    <ul></ul>
    <div class="pagination pt-6 text-center">
        <button class="btnPrevPage" data-url="">Vorherige Seite</button>
        <div class="inline-block">
            Seite <span class="currentPage"></span> von <span class="totalPages"></span>
        </div>
        <button class="btnNextPage" data-url="">Nächste Seite</button>
    </div>
</div>

<script type="application/javascript">
    const listPage = {{ $listPage }};
    const articleApiHost = "{{ Config::get('app.articleApiHost') }}";
</script>

@vite('resources/js/articleList.js')
@endsection


