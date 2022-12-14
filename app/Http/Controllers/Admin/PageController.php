<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePage;
use App\Models\Page;

class PageController extends Controller
{
	/**
	 * Show a table of all pages.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.pages.index', [
			'pages' => Page::where('parent_id', null)->get(), // children are quieried in the view
		]);
	}

	/**
	 * Edit the page.
	 *
	 * @param Page $page
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function edit(Page $page)
	{
		return view('admin.pages.edit', [
			'availablePages' => Page::where('id', '!=', $page->id)->get(),
			'page' => $page,
		]);
	}

	/**
	 * Create new page.
	 *
	 * @param Page $page
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function create()
	{
		return view('admin.pages.create', [
			'availablePages' => Page::all(),
		]);
	}

	/**
	 * Store the incoming page.
	 *
	 * @param StorePage $request
	 * @return Response
	 */
	public function store(StorePage $request)
	{
		Page::create([
			'name' => $request->name,
			'content' => $request->content,
			'parent_id' => ($request->parent_id == 0) ? null : $request->parent_id,
			'is_page' => ($request->is_page) ? 1 : 0,
			'author_id' => auth()->user()->id,
			'order_id' => $request->order_id
		]);

		return redirect(route('admin.pages.index'));
	}

	/**
	 * Update the page.
	 *
	 * @param Page $page
	 * @return Response
	 */
	public function update(StorePage $request, Page $page)
	{
		$page->update([
			'name' => $request->name,
			'content' => $request->content,
			'parent_id' => ($request->parent_id == 0) ? null : $request->parent_id,
			'is_page' => ($request->is_page) ? 1 : 0,
			'order_id' => $request->order_id
		]);

		return redirect(route('admin.pages.index'));
	}

	/**
	 * Delete the page.
	 *
	 * @param Page $page
	 * @return Response
	 */
	public function destroy(Page $page)
	{
		$page->delete();

		return redirect(route('admin.pages.index'));
	}
}
