<template>
    <admin-layout>
        <!-- breadcrumb items -->
        <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link
                            :href="route('dashboard')"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </Link>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <div class= "text-gray-700 ml-1 md:ml-2 text-sm font-medium">
                                <Link
                                    :href="route('admin.companys.index')"
                                >
                                    Companys
                                </Link>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <div class= "text-gray-700 ml-1 md:ml-2 text-sm font-medium">
                                <Link
                                    :href="route('admin.companys.create')"
                                >
                                    Create
                                </Link>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- breadcrumb header -->
            <div class="text-3xl font-bold mt-2 mb-2">
                Create company
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Company profile
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            This information will be displayed publicly so be careful what you share.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                <form @submit.prevent="storeData">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="initial" class="block text-sm font-medium text-gray-700">Initial</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.initial"
                                        autofocus
                                    />
                                    <jet-input-error :message="form.errors.initial" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Company name</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.name"
                                    />
                                    <jet-input-error :message="form.errors.name" class="mt-2" />
                                </div>

                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.description"
                                    />
                                    <jet-input-error :message="form.errors.description" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="company-website" class="block text-sm font-medium text-gray-700">
                                        Website
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            http://
                                        </span>
                                        <input type="text" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com"
                                            v-model="form.web"
                                        />
                                    </div>
                                    <jet-input-error :message="form.errors.web" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="company-email" class="block text-sm font-medium text-gray-700">
                                        Email
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            @
                                        </span>
                                        <input type="email" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="example@gmail.com"
                                            v-model="form.email"
                                        />
                                    </div>
                                    <jet-input-error :message="form.errors.email" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="telephone" class="block text-sm font-medium text-gray-700">Telephone</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.telephone"
                                    />
                                    <jet-input-error :message="form.errors.telephone" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fax" class="block text-sm font-medium text-gray-700">Fax number</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.fax"
                                    />
                                    <jet-input-error :message="form.errors.fax" class="mt-2" />
                                </div>

                                <div class="col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Street address</label>
                                    <textarea rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.address"
                                    />
                                    <jet-input-error :message="form.errors.address" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.city"
                                    />
                                    <jet-input-error :message="form.errors.city" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.province"
                                    />
                                    <jet-input-error :message="form.errors.province" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.postal_code"
                                    />
                                    <jet-input-error :message="form.errors.postal_code" class="mt-2" />
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <jet-button
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Save
                            </jet-button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import JetButton from '@/JetStream/Button.vue';
import JetInput from '@/JetStream/Input.vue';
import JetInputError from '@/JetStream/InputError.vue'
import JetLabel from '@/JetStream/Label.vue'
import JetActionMessage from '@/JetStream/ActionMessage.vue';
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout";

export default {
    created () {
        document.title = "Create Company";
    },
    components: {
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        Link,
        AdminLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                initial: "",
                description: "",
                name: "",
                address: "",
                province: "",
                city: "",
                postal_code: "",
                web: "",
                email: "",
                telephone: "",
                fax: "",
            }),
        }
    },
    methods: {
        storeData() {
            this.form.post(this.route('admin.companys.store'), {
                errorBag: 'storeData',
                preserveScroll: true,
            })
        }
    }

}
</script>
