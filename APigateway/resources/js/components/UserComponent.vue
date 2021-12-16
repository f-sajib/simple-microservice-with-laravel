<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div>
                            Profile
                        </div>

                        <div style="float: right !important;margin-left: auto; cursor: pointer"
                             class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">

                            <a @click="logout">Logout</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                           {{name}}
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Email
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            {{email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>


<script>

    export default{
        data() {
            return {
                name: '',
                email: ''
            }
        },
        mounted() {
            if(localStorage.length === 0)  {
                 window.location.href = window.location.origin+'/login'
            } else {
                this.getUser()
            }

        },
        methods: {
           async getUser() {
                await axios.get('api/user', {
                    headers: {
                        Authorization: 'Bearer '+localStorage.usertoken
                    }
                })
                .then(res => {
                    this.name = res.data.name;
                    this.email = res.data.email;
                })
            },
            logout() {
                 axios.get('api/logout', {
                    headers: {
                        Authorization: 'Bearer '+localStorage.usertoken
                    }
                })
                .then(res => {
                    localStorage.removeItem('usertoken')
                    localStorage.removeItem('user')
                    window.location.href = window.location.origin+'/login'
                })

            }
        }
    }


</script>
