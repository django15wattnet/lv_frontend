/**
 * Liste aller Artikel, paginiert, per fetch aus dem Backend geladen
 */
document.addEventListener('DOMContentLoaded', (ev) => {

    ArticleList.urlApi = `${articleApiHost}api/articlesPaginated/10`;

    let url = '';
    if (0 !== listPage) {
        url = ArticleList.urlApi + '?page=' + listPage;
    }

    const articleList = new ArticleList().init().loadArticles(url);
});

class ArticleList
{
    listArticleOuter = null;
    elemBtnPrev = null;
    elemBtnNext = null;
    elemSpanCurrentPage = null;
    elemSpanTotalPages = null;
    currentPage = 1;
    static urlApi = '';


    init()
    {
        this.listArticleOuter = document.querySelector('main .listArticleOuter');
        if (null === this.listArticleOuter) {
            return ;
        }

        // Die Blätter-Buttons initialisieren
        this.elemBtnPrev = this.listArticleOuter.querySelector('.btnPrevPage');
        this.elemBtnNext = this.listArticleOuter.querySelector('.btnNextPage');

        this.elemBtnPrev.addEventListener('click', this.onClickBtnPagination.bind(this));
        this.elemBtnNext.addEventListener('click', this.onClickBtnPagination.bind(this));

        // Die SPANs für die Seiteninfos ermitteln
        this.elemSpanCurrentPage = this.listArticleOuter.querySelector('.pagination .currentPage');
        this.elemSpanTotalPages  = this.listArticleOuter.querySelector('.pagination .totalPages');

        return this;
    }


    loadArticles(url = '')
    {
        if (null === this.listArticleOuter) {
            // Das Element, in dem die Artikelliste angezeigt werden soll, existiert nicht.
            return;
        }

        if ('' === url) {
            // Die URL ist leer, also die Standard-URL verwenden
            url = this.urlApi;
        }

        fetch(
            url,
            {
                method: 'GET',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin'
            }
        ).then(
            (resp) => {
                resp.json().then(
                    (data) => {
                        this.emptyArticleList();
                        this.writeDataToArticleList(data);
                    }
                );
            }
        );
    }


    /**
     * Löscht alle Artikel-LIs aus der Artikelliste
     */
    emptyArticleList()
    {
        const elemUl = this.listArticleOuter.querySelector('ul');
        while (elemUl.firstChild) {
            elemUl.removeChild(elemUl.firstChild);
        }

        return this;
    }


    writeDataToArticleList(data)
    {
        const elemUl = this.listArticleOuter.querySelector('ul');

        this.currentPage = data.current_page;

        // Das Artikel-UL mit den Artikeln aus dem Backend befüllen
        data.data.forEach(
            (objArticle) => {
                const elemLi = this.articleToLi(objArticle);
                elemUl.appendChild(elemLi);
            }
        );

        // Die URLs in die Blätter-Buttons schreiben
        this.elemBtnPrev.dataset.url = null === data.prev_page_url ? '' : data.prev_page_url;
        this.elemBtnNext.dataset.url = null === data.next_page_url ? '' : data.next_page_url

        // Die Seiteninfos ausgeben
        this.elemSpanCurrentPage.textContent = data.current_page;
        this.elemSpanTotalPages.textContent  = data.last_page;
    }


    articleToLi(article)
    {
        const elemLi = document.createElement('li');
        const elemA = document.createElement('a');

        elemA.href = `/article/${article.id}/?listPage=${this.currentPage}`;
        elemA.textContent = article.title;

        elemLi.appendChild(elemA);

        return elemLi;
    }


    onClickBtnPagination(ev)
    {
        this.loadArticles(ev.target.dataset.url);
    }
}
