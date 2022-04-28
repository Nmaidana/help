<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SIG008\BulkDestroySIG008;
use App\Http\Requests\Admin\SIG008\DestroySIG008;
use App\Http\Requests\Admin\SIG008\IndexSIG008;
use App\Http\Requests\Admin\SIG008\StoreSIG008;
use App\Http\Requests\Admin\SIG008\UpdateSIG008;
use App\Models\SIG008;
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

class SIG008Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSIG008 $request
     * @return array|Factory|View
     */
    public function index(IndexSIG008 $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SIG008::class)->processRequestAndGet(
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

        return view('admin.s-i-g008.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.s-i-g008.create');

        return view('admin.s-i-g008.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSIG008 $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSIG008 $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SIG008
        $sIG008 = SIG008::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/s-i-g008-s'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/s-i-g008-s');
    }

    /**
     * Display the specified resource.
     *
     * @param SIG008 $sIG008
     * @throws AuthorizationException
     * @return void
     */
    public function show(SIG008 $sIG008)
    {
        $this->authorize('admin.s-i-g008.show', $sIG008);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SIG008 $sIG008
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SIG008 $sIG008)
    {
        $this->authorize('admin.s-i-g008.edit', $sIG008);


        return view('admin.s-i-g008.edit', [
            'sIG008' => $sIG008,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSIG008 $request
     * @param SIG008 $sIG008
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSIG008 $request, SIG008 $sIG008)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SIG008
        $sIG008->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/s-i-g008-s'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/s-i-g008-s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySIG008 $request
     * @param SIG008 $sIG008
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySIG008 $request, SIG008 $sIG008)
    {
        $sIG008->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySIG008 $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySIG008 $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SIG008::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
