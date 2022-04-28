<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Assist\BulkDestroyAssist;
use App\Http\Requests\Admin\Assist\DestroyAssist;
use App\Http\Requests\Admin\Assist\IndexAssist;
use App\Http\Requests\Admin\Assist\StoreAssist;
use App\Http\Requests\Admin\Assist\UpdateAssist;
use App\Models\Assist;
use App\Models\State;
use App\Models\SIG008;
use App\Models\RHM006;
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

class AssistsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAssist $request
     * @return array|Factory|View
     */
    public function index(IndexAssist $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Assist::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'heritage', 'id_user', 'date', 'id_state', 'id_category'],

            // set columns to searchIn
            ['id']


        );




        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.assist.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.assist.create');

        $state=State::all();

        return view('admin.assist.create', compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAssist $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAssist $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['id_state']=  $request->getStateId();

        // Store the Assist
        $assist = Assist::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/assists'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/assists');
    }

    /**
     * Display the specified resource.
     *
     * @param Assist $assist
     * @throws AuthorizationException
     * @return void
     */
    public function show(Assist $assist)
    {
        $this->authorize('admin.assist.show', $assist);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Assist $assist
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Assist $assist)
    {
        $this->authorize('admin.assist.edit', $assist);
        $state=State::all();


        return view('admin.assist.edit', [
            'assist' => $assist,
            'state' => $state,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAssist $request
     * @param Assist $assist
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAssist $request, Assist $assist)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['id_state']=  $request->getStateId();

        // Update changed values Assist
        $assist->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/assists'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/assists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAssist $request
     * @param Assist $assist
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAssist $request, Assist $assist)
    {
        $assist->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAssist $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAssist $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Assist::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
