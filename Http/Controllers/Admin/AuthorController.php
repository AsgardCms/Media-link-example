<?php

namespace Modules\MediaLinkExample\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MediaLinkExample\Entities\Author;
use Modules\MediaLinkExample\Repositories\AuthorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AuthorController extends AdminBaseController
{
    /**
     * @var AuthorRepository
     */
    private $author;

    public function __construct(AuthorRepository $author)
    {
        parent::__construct();

        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $authors = $this->author->all();

        return view('medialinkexample::admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('medialinkexample::admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->author->create($request->all());

        return redirect()->route('admin.MediaLinkExample.author.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('medialinkexample::authors.title.authors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        return view('medialinkexample::admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Author $author
     * @param  Request $request
     * @return Response
     */
    public function update(Author $author, Request $request)
    {
        $this->author->update($author, $request->all());

        return redirect()->route('admin.MediaLinkExample.author.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('medialinkexample::authors.title.authors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Author $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        $this->author->destroy($author);

        return redirect()->route('admin.MediaLinkExample.author.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('medialinkexample::authors.title.authors')]));
    }
}
