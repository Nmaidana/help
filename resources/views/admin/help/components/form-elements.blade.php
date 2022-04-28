<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ci'), 'has-success': fields.ci && fields.ci.valid }">
    <label for="ci" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.ci') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input  @change="findData" type="text" v-model="form.ci" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ci'), 'form-control-success': fields.ci && fields.ci.valid}" id="ci" name="ci" placeholder="{{ trans('admin.help.columns.ci') }}">
        <div v-if="errors.has('ci')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ci') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.help.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user'), 'has-success': fields.user && fields.user.valid }">
    <label for="user" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.user') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" v-model="form.user" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user'), 'form-control-success': fields.user && fields.user.valid}" id="user" name="user" placeholder="{{ trans('admin.help.columns.user') }}">
        <div v-if="errors.has('user')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user') }}</div>
    </div>
</div>

<div style="display: none" class="form-group row align-items-center" :class="{'has-danger': errors.has('id_dependency'), 'has-success': fields.id_dependency && fields.id_dependency.valid }">
    <label for="id_dependency" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.id_dependency') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" v-model="form.id_dependency" v-validate="" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_dependency'), 'form-control-success': fields.id_dependency && fields.id_dependency.valid}" id="id_dependency" name="id_dependency" placeholder="{{ trans('admin.help.columns.id_dependency') }}">
        <div v-if="errors.has('id_dependency')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_dependency') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dependency'), 'has-success': fields.dependency && fields.dependency.valid }">
    <label for="dependency" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.dependency') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" v-model="form.dependency" v-validate="" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dependency'), 'form-control-success': fields.dependency && fields.dependency.valid}" id="dependency" name="dependency" placeholder="{{ trans('admin.help.columns.dependency') }}">
        <div v-if="errors.has('dependency')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dependency') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fone'), 'has-success': fields.fone && fields.fone.valid }">
    <label for="fone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.fone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fone'), 'form-control-success': fields.fone && fields.fone.valid}" id="fone" name="fone" placeholder="{{ trans('admin.help.columns.fone') }}">
        <div v-if="errors.has('fone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('problem'), 'has-success': fields.problem && fields.problem.valid }">
    <label for="problem" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.help.columns.problem') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.problem" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('problem'), 'form-control-success': fields.problem && fields.problem.valid}" id="problem" name="problem" placeholder="{{ trans('admin.help.columns.problem') }}">
        <div v-if="errors.has('problem')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('problem') }}</div>
    </div>
</div>


