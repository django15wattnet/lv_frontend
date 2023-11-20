<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Exceptions\NotFound;
use App\Service\ArticleApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function __construct(protected readonly ArticleApiService $articleApiService) { }


    public function articleListAction(Request $req): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|Application
    {
        return view(
            'articleList',
            ['listPage' => $req->get('listPage', 1)]
        );
    }


    public function articleAction(Request $req, int $id): View
    {
        try {
            return view(
                'article',
                [
                    'article'  => $this->articleApiService->getArticleById($id),
                    'listPage' => $req->get('listPage', 1),
                ]
            );

        } catch (NotFound $e)  {
            abort(404, $e->getMessage());

        } catch (\Exception $e) {
            abort(499, $e->getMessage());
        }
    }
}
