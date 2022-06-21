<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <th>id</th>
                        <th>Name</th>
                        <th>Volume</th>
                        <th>Number</th>
                        <th>Publish Date</th>
                        <th>Key words</th>
                        <th> </th>
                    </thead>
                    <tbody>
                        <tr v-for="tableItem, index in items" :key="tableItem.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ tableItem.name }}</td>
                            <td>{{ tableItem.volume }}</td>
                            <td>{{ tableItem.number }}</td>
                            <td>{{ tableItem.publish_date }}</td>
                            <td>{{ tableItem.keywords }}</td>
                            <td>
                                <button v-on:click.prevent="removeItem(tableItem.id)" class="button btn-danger">
                                    &#10006;
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                items: [],
            }
        },
        mounted() {
            console.log('Component mounted.')

            this.$root.$on('addNewJournal', (item) => {
                console.log(item)
                this.loadAllJournals()
            })
        },

        props:['userId'],

        methods:{
            // Update cart value on page load
            async loadAllJournals(){
                let tab = await axios.post('/admin');
                this.items = tab.data.items
            },

            async removeItem(id) {

                if(this.userId == 0){
                    this.$toastr.e('You need to Login to Delete.');
                    return;
                }

                console.log(id)
                let response = await axios.delete('/delete/' + id);
                console.log(response)
                this.$toastr.e(response.data);

                this.loadAllJournals()
            }
        },

        created(){
            this.loadAllJournals();
        }
    }
</script>
