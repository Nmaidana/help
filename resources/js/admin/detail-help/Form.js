import AppForm from '../app-components/Form/AppForm';

Vue.component('detail-help-form', {
    mixins: [AppForm],
    props:['help', 'state'],
    data: function() {
        return {
            form: {
                help_id:  this.help ,
                user_id:  '' ,
                state: '' ,
                solution:  '' ,
                date:  '' ,
                category_id:  '' ,

            }
        }
    }

});
