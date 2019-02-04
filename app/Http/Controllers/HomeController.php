<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$intTotalPage = Article::count();
		$intTotalPage = ceil($intTotalPage/5);
		$objArticle = Article::select('*','category')->groupBy('category')->get();
		return view('landing/index', ['intTotalPage' => $intTotalPage, 'objArticle' => $objArticle]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request)
	{
		$objArticle = Article::orderBy('id', 'desc')->paginate(5);
		$strHtml = view("landing/single-post",compact('objArticle'))->render();
		return response()->json($strHtml);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function onlySourceTitle(Request $request)
	{
		$tsStart = microtime(true);
		$objArticle = Article::select('source_name as source', 'title')->orderBy('id', 'desc')->get();
		$tsEnd = microtime(true);
		$fltTimeTaken = $tsEnd - $tsStart;
		return response()->json(['data' => $objArticle, 'time_taken' => round($fltTimeTaken, 3).'second(s)', 'total_record' => $objArticle->count()], 200, [], JSON_PRETTY_PRINT);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
