<?php
declare(strict_types=1);
namespace App\Service;

use App\Exceptions\NotFound;
use Exception;
use Illuminate\Support\Facades\Http;
use stdClass;

/**
 * Zugriff auf die Article-API
 */
class ArticleApiService
{
    /**
     * Host der ArticleAPI
     * @var string
     */
    protected string $articleApiHost;

    public function __construct()
    {
        $this->articleApiHost = config('app.articleApiHost');
    }


    /**
     * Liefert den Artikel mit der ID $id oder eine Exception.
     *
     * @param int $id
     *
     * @return stdClass
     *
     * @throws NotFound
     * @throws Exception
     */
    public function getArticleById(int $id): stdClass
    {
        $url = "{$this->articleApiHost}api/article/{$id}";

        try {
            $res = Http::get($url);

        } catch (Exception $e) {
            throw new Exception("Article with id {$id} can't be fetched. Status: {$e->getMessage()}");
        }

        if (200 === $res->status()) {
            return (object)$res->json();
        }

        throw match ($res->status()) {
            404     => new NotFound("Article with id {$id} not found"),
            default => new Exception("Article with id {$id} can't be fetched. Status: {$res->status()}"),
        };
    }
}
