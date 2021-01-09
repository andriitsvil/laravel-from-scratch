<?php

namespace App\Http\Controllers;

use App\Models\Article;

use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;


/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{
    /**
     * @param Article $article
     * @return Application|Factory|View
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('articles.create', ['tags' => Tag::all()]);
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        if (request()->has('tags')) {
            $article->tags()->attach(request('tags'));
        }
        
        return redirect(route('articles.index'));
    }

    /**
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * @param Article $article
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Article $article)
    {
        $article->update($this->validateArticle());
        return redirect($article->path());
    }

    /**
     * @return array
     */
    public function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
