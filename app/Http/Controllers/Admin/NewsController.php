<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\UploadService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('admin.news.index', [
            'newsList' => News::with(['category', 'source']) //чтобы не было кучи запросов к БД
                ->paginate(config('news.paginate'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.create', [
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request, News $news)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $uploadService = app(UploadService::class);
            $fileURL = $uploadService->upload($request->file('image'));
            $data['image'] = $fileURL;
        }

        $news = $news->fill($data)->save();

        if($news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.update.success'));
        }

        return back()->with('error', __('messages.admin.news.update.fail'))->withInput();
    }

        //dd($request->input('title', 'Заголовок по умолчанию'));

        //$data = $request->except('_token');

        // После валидации взамен $request->only('category_id', 'title', 'author', 'description', 'source_id') используем $request->validated
        /*$news = News::create($request->validated());

        if($news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.create.success'));
        }

        return back()->with('error', __('messages.admin.news.create.fail'))->withInput();
        // хелпер trans(или __) просто выводит сообщение из папки локализации
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $uploadService = app(UploadService::class);
            $fileURL = $uploadService->upload($request->file('image'));
            $data['image'] = $fileURL;
        }

        $news = $news->fill($data)->save();

        if($news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.update.success'));
        }

        return back()->with('error', __('messages.admin.news.update.fail'))->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if($request->ajax()) {
            try {
                $news->delete();
                return response()->json(['message' => 'ok']);

            } catch(\Exception $e) {
                \Log::error("error deleting news" . PHP_EOL, [$e]);
                return response()->json(['message' => 'error', 400]);
            }
        }

        /* Это вариант из удаления с чистым js
         * $status = $news->delete();
        if($status) {
            return response()->json(['ok' => 'ok']);
        }*/
    }
}
