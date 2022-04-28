import AppForm from '../app-components/Form/AppForm';

Vue.component('help-form', {
    mixins: [AppForm],
    props:['finddataurl'],
    data: function() {
        return {
            form: {
                ci:  '' ,
                name:  '' ,
                user:  '' ,
                dependency:  '' ,
                fone:  '' ,
                problem:  '' ,

            }
        }
    },
    methods: {

        findData: function () {

            axios
                .get(this.finddataurl + "/" + this.form.ci)
                .then(response => {
                   console.log(response.data)
                    if (!response.data.error) {
                        this.errorcedula = '';
                        this.form.name = response.data.cedula.FuncNom;
                        this.form.user = response.data.cedula.FUsuCod;
                        this.form.dependency = response.data.cedula.dpto.DepenDes;
                        this.form.id_dependency = response.data.cedula.dpto.DepenCod;

                    } else {

                        console.log('No funciona')
                        this.form.name = '';
                        this.form.user = '';
                        this.form.dependency = '';
                        this.form.id_dependency = '';
                        this.errorcedula = 'Cedula no se encuentra en base de datos';
                        this.$notify({ type: 'error', title: 'Error!', text:'Cedula no se encuentra en base de datos' });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    this.form.name = '';
                    this.form.user = '';
                    this.form.dependency = '';
                    this.form.id_dependency = '';
                    this.$notify({ type: 'error', title: 'Error buscando datos', text: error });
                })

        },
        onCancel: function () {
            console.log('User cancelled the loader.')
        }
    },


});
