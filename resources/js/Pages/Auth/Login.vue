<template>

    <Head title="Log in" />

    <!-- <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </jet-button>
            </div>
        </form>
    </jet-authentication-card> -->

    <div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url(/storage/background/background.jpg)">
                <div class="flex items-center h-full px-20 bg-opacity-50">
                    <div class="p-2 bg-gray-900 bg-opacity-80 rounded-md">
                        <div class="flex items-center">
                            <span class="text-4xl font-bold text-yellow-500">
                                SkyCode
                            </span>

                            <span class="ml-2 text-4xl font-bold text-red-500">
                                - Channel
                            </span>
                        </div>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Channel yang membahas pemprograman berbasis web & dekstop dengan laravel, flutter, VueJS,
                            Code Igniter, .NET, #C, SQL Server & MYSQL
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="flex justify-center">
                        <div class="flex-shrink-0 h-20 w-20">
                            <img class="h-20 w-20 rounded-full" src="/storage/logo/logo.png" alt="Logo" />
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                    </div>

                    <div class="mt-8">
                        <form @submit.prevent="submit">
                            <div>
                                <jet-label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="email"
                                    value="Email" />
                                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                    required autofocus />
                            </div>

                            <div class="mt-4">
                                <jet-label class="text-sm text-gray-600 dark:text-gray-200" for="password"
                                    value="Password" />
                                <jet-input id="password" type="password" class="mt-1 block w-full"
                                    v-model="form.password" required autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <label class="flex items-center">
                                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-200">Remember me</span>
                                </label>
                            </div>

                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
// import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
// import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Head,
        // JetAuthenticationCard,
        // JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
    }
})
</script>
