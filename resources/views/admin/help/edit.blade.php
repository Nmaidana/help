@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.help.actions.edit', ['name' => $help->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <help-form
                :action="'{{ $help->resource_url }}'"
                :data="{{ $help->toJson() }}"
                :finddataurl = "'{{ url('cedula') }}'"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.help.actions.edit', ['name' => $help->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.help.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </help-form>

        </div>

</div>

@endsection
