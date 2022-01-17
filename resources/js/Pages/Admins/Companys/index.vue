<template>
    <admin-layout>
        <!-- breadcrumb items -->
        <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link
                            :href="route('admin.dashboards.index')"
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
                </ol>
            </nav>

            <!-- breadcrumb header -->
            <div class="text-3xl font-bold mt-2 mb-2">
                Companys
            </div>
        </div>

        <!-- search, select option paginate & button create -->
        <div class="flex flex-row flex-wrap space-x-0 lg:space-x-2 mb-2">
            <div class="w-full lg:w-64 mb-2 lg:mb-0">
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="text-gray-500 sm:text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- textbox search -->
                    <input type="text"
                        class="
                            focus:ring-indigo-500
                            focus:border-indigo-500
                            block w-full pl-7 pr-12
                            sm:text-sm border-gray-300 rounded-md
                        "
                        placeholder="Search"
                        v-model="form.search"
                    />

                    <!-- select option paginate -->
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <select class="
                            focus:ring-indigo-500
                            focus:border-indigo-500
                            h-full py-0 pl-2 pr-7 border-transparent
                            bg-transparent
                            text-gray-500
                            sm: text-sm rounded-md
                        "
                        v-model="form.per_page"
                        >
                            <option>5</option>
                            <option>10</option>
                            <option>50</option>
                            <option>100</option>
                            <option>500</option>
                            <option>1000</option>
                        </select>
                    </div>
                </div>
            </div>

            <jet-button class="w-full lg:w-auto text-center mb-2 lg:mb-0">
                <Link
                    :href="route('admin.companys.create')"
                >
                    Create
                </Link>
            </jet-button>
        </div>

        <!-- data list -->
        <div v-for="(company, index) in companys.data" :key="index">
            <div class="bg-white">
                <div class="pt-2">
                    <!-- Product info -->
                    <div class="max-w-2xl mx-auto pt-2 pb-2 px-4 sm:px-6 lg:max-w-7xl lg:pt-2 lg:pb-2 lg:px-2 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-2">
                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                                {{ company.name }}
                            </h1>
                        </div>

                        <!-- Options -->
                        <div class="mt-2 lg:mt-0 lg:row-span-3">
                            <h2 class="sr-only">Product information</h2>
                            <p class="text-3xl text-gray-900">
                                {{ company.initial }}
                            </p>

                            <!-- Reviews -->
                            <div class="mt-2">
                            <h3 class="sr-only">Reviews</h3>
                                <div class="flex flex-col">
                                    <!-- province & city -->
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p class="ml-3 text-sm font-medium">
                                            {{ company.province }} - City : {{ company.city }} - Postal Code : {{ company.postal_code }}
                                        </p>
                                    </div>

                                    <!-- website -->
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="ml-3 text-sm font-medium">
                                            {{ company.web }}
                                        </p>
                                    </div>

                                    <!-- email -->
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                        <p class="ml-3 text-sm font-medium">
                                            {{ company.email }}
                                        </p>
                                    </div>

                                    <!-- telephone & fax -->
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>

                                        <p class="ml-3 text-sm font-medium">
                                            {{ company.telephone }} - Fax : {{ company.fax }}
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-2">
                                <Link
                                    :href="route('admin.companys.edit', company.id)"
                                >
                                    <button type="submit" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Edit
                                    </button>
                                </Link>
                            </div>
                        </div>

                        <div class="py-10 lg:pt-2 lg:pb-2 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <!-- Description and details -->
                            <div>
                                <h3 class="sr-only">Description</h3>

                                <div class="space-y-6">
                                    <p class="text-base text-gray-900">
                                        {{ company.description }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-2">
                                <h2 class="text-sm font-medium text-gray-900">Address</h2>

                                <div class="mt-2 space-y-6">
                                    <p class="text-sm text-gray-600">
                                        {{ company.address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pagination -->
        <div class="bg-white px-3 py-1 flex items-center justify-between border-t border-gray-200 sm:px-3">
            <!-- button -->
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="btn-pagination" :disabled="companys.current_page <= 1"
                    @click.prevent="paginate(companys.current_page - 1)"
                >
                    Previous
                </button>

                <button class="btn-pagination" :disabled="companys.current_page >= companys.last_page"
                    @click.prevent="paginate(companys.current_page + 1)"
                >
                    Next
                </button>
            </div>

            <!-- information -->
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm leading-5 text-gray-700">
                        Showing
                        <span class="font-medium">
                            {{ companys.from }}
                        </span>
                        to
                        <span class="font-medium">
                            {{ companys.to }}
                        </span>
                        of
                        <span class="font-medium">
                            {{ companys.total }}
                        </span>
                        result
                    </p>
                </div>

                <!-- menampilkan pagination -->
                <pagination
                    :current_page="current_page"
                    :total="companys.total"
                    :per_page="companys.per_page"
                    :last_page="companys.last_page"
                    :from="companys.from"
                    :to="companys.to"
                    @paginate="paginate"
                    :offset="4"
                >
                </pagination>
            </div>

        </div>

    </admin-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/AdminLayout";
import JetButton from "@/Jetstream/Button.vue";
import Pagination from "@/Components/Pagination";
import Button from "../../../Jetstream/Button.vue";

export default {
    created () {
        document.title = "Companys";
    },
    components: {
        Link,
        AdminLayout,
        JetButton,
        Pagination,
        Button,
    },
    props: {
        filters: Object,
        companys: Object,
    },
    data() {
        return{
            current_page: this.companys.current_page,
            form: {
                search: this.filters.search,
                per_page: this.companys.per_page,
                page: this.filters.page,
                sort_by: this.filters.sort_by,
                sort_dir: this.filters.sort_dir ?? "asc",
            }
        }
    },
    watch: {
        form: {
            handler: _.throttle(function () {
                let query = _.pickBy(this.form);
                this.$inertia.get(
                    this.route("admin.companys.index"),
                    Object.keys(query).length ? query : { remember: "forget" },
                    { preserveState: true }
                );
            }, 300),
            deep: true,
        },
        companys(companys) {
            this.current_page = companys.current_page;
        }
    },
    methods: {
        reset() {
            this.form = _.mapValues(this.form, () => null);
        },
        paginate(page) {
            this.form.page = page;
        }
    }
}
</script>
