<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add a Journal</div>

                    <div class="card-body">
                        <form method="POST" action="#">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <select id="name" class="form-control" name="name" v-model="formData.name" required autofocus>
                                        <option value=""></option>
                                        <option value="JOFAMD">JOFAMD</option>
                                        <option value="JOFIGSS">JOFIGSS</option>
                                        <option value="JABCA">JABCA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="volume" class="col-md-4 col-form-label text-md-end">Volume</label>

                                <div class="col-md-6">
                                    <input id="volume" type="number" class="form-control" name="volume" v-model="formData.volume" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="number" class="col-md-4 col-form-label text-md-end">Number</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number" v-model="formData.number" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="publish" class="col-md-4 col-form-label text-md-end">Publish Date</label>

                                <div class="col-md-6">
                                    <input id="publish_date" type="text" class="form-control" name="publish_date" v-model="formData.publish_date" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="abstract" class="col-md-4 col-form-label text-md-end">Abstract</label>

                                <div class="col-md-6">
                                    <textarea id="abstract" type="textarea" class="form-control" name="abstract" v-model="formData.abstract" required autocomplete="email"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="keywords" class="col-md-4 col-form-label text-md-end">Key words</label>

                                <div class="col-md-6">
                                    <input id="keywords" type="text" class="form-control" name="keywords" v-model="formData.keywords" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <label class="form-control cusor-pointer">
                                        <span>
                                        </span>
                                        <input type="file" name="journal" id="journal" class="hidden" ref="journal" @change="handleDoc">
                                    </label>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" v-on:click.prevent="addJournal">
                                        Submit Journal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                formData: {
                    name: '',
                    volume: '',
                    number: '',
                    publish_date: '',
                    abstract: '',
                    keywords: '',
                },
                doc: null,
                docName: null,
            }
        },
        props:['userId'],
        methods:{
            async addJournal(){
                // Checking if user is logged in
                
                if(this.userId == 0){
                    this.$toastr.e('You need to Login to Add Journal;');
                    return;
                }

                let formData = new FormData()
                
                formData.append('document', this.doc)

                _.each(this.formData, (value, key) => {
                    formData.append(key, value)
                })

                try{
                    let tab = await axios.post('/admin/create', formData, {
                        headers: {
                            'Content-Type': "multipart/form-data"
                        }
                    })

                    this.$root.$emit('addNewJournal', tab.data.latest)
                } catch(error) {
                    if (error.response) {

                        let errors = error.response.data.errors

                        for (let field of Object.keys(errors)) {
                            if (errors[field] == "The abstract has already been taken."){
                                this.$toastr.e('Journal already exists in database', 'Error!')
                            }

                            this.$toastr.e(errors[field], 'Error!')
                        }
                    }
                }

                this.formData.name = '';
                this.formData.volume = '';
                this.formData.number = '';
                this.formData.publish_date = '';
                this.formData.abstract = '';
                this.formData.keywords = '';
                this.doc = null;
            },

            handleDoc() {
                this.doc = this.$refs.journal.files[0]
                this.docName = this.doc.name
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
