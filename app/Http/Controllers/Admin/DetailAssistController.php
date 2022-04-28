<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DetailAssist\BulkDestroyDetailAssist;
use App\Http\Requests\Admin\DetailAssist\DestroyDetailAssist;
use App\Http\Requests\Admin\DetailAssist\IndexDetailAssist;
use App\Http\Requests\Admin\DetailAssist\StoreDetailAssist;
use App\Http\Requests\Admin\DetailAssist\UpdateDetailAssist;
use App\Models\DetailAssist;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DetailAssistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDetailAssist $request
     * @return array|Factory|View
     */
    public function index(IndexDetailAssist $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DetailAssist::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.detail-assist.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.detail-assist.create');

        return view('admin.detail-assist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDetailAssist $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDetailAssist $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DetailAssist
        $detailAssist = DetailAssist::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detail-assists'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detail-assists');
    }

    /**
     * Display the specified resource.
     *
     * @param DetailAssist $detailAssist
     * @throws AuthorizationException
     * @return void
     */
    public function show(DetailAssist $detailAssist)
    {
        $this->authorize('admin.detail-assist.show', $detailAssist);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DetailAssist $detailAssist
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DetailAssist $detailAssist)
    {
        $this->authorize('admin.detail-assist.edit', $detailAssist);


        return view('admin.detail-assist.edit', [
            'detailAssist' => $detailAssist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDetailAssist $request
     * @param DetailAssist $detailAssist
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDetailAssist $request, DetailAssist $detailAssist)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DetailAssist
        $detailAssist->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/detail-assists'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/detail-assists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDetailAssist $request
     * @param DetailAssist $detailAssist
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDetailAssist $request, DetailAssist $detailAssist)
    {
        $detailAssist->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDetailAssist $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDetailAssist $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DetailAssist::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
