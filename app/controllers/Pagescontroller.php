<?php 

class Pagescontroller extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pagescontroller
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('pages.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pagescontroller/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pagescontroller
	 *
	 * @return Response
	 */
	public function store()
	{
		return View::make('pages.store');
	}

	/**
	 * Display the specified resource.
	 * GET /pagescontroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('pages.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pagescontroller/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('pages.edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pagescontroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pagescontroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}