<template>
    <div class="container">
        <div class="mt-5 d-flex float-end text-purple font-bold">
            <a :href="baseRoute">
                Tasks
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">Please Register</div>

                    <div class="card-body">
                        <form @submit.prevent="register"  class="w-full max-w-sm">
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-full-name">
                                        Name
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name"
                                        type="text"
                                        required
                                        placeholder="name"
                                        v-model="name">
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-email">
                                        Email
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-email"
                                        type="text"
                                        required
                                        placeholder="exampale@email.com"
                                        v-model="email">
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="password">
                                        Password
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="password"
                                        type="password"
                                        v-model="password"
                                        required
                                        placeholder="******************">
                                </div>
                            </div>

                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="confirm-password">
                                        Confirm Password
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="confirm-password"
                                        v-model="password_confirmation"
                                        type="password"
                                        required
                                        placeholder="******************">
                                </div>
                            </div>
                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-2/3">
                                    <button
                                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                            <div class="md:flex md:items-center mt-3">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-2/3">
                                    Already have an account?
                                </div>
                                <div class="md:w-3/3 text-purple font-bold">
                                    <a :href="loginRoute" style="cursor: pointer">
                                        Login
                                    </a>
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
        data() {
            return {
                name: null,
                email: null,
                password_confirmation: null,
                password: null,
                loginUrl: null,
            }
        },
        computed: {
            userRoute() {
                return window.location.origin+'/user';
            },
            loginRoute() {
                return window.location.origin+'/login'
            },
            baseRoute() {
                return window.location.origin
            }
        },
        mounted() {
            if(localStorage.usertoken) {
                window.location.href = this.userRoute
            }
            console.log('Mounted')
        },
        methods: {
            register() {
                let data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }
                axios.post('/api/register',data)
                    .then(res => {
                        if(res.status) {
                            window.location.href = this.loginRoute
                        }
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        }
    }
</script>
