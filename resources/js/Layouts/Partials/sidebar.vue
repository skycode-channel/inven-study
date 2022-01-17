<template>
    <aside class="flex flex-col w-64 h-screen p-2 bg-gray-800"
        v-if="openNav"
    >
        <!-- logo -->
        <div class="flex flex-col items-center">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <span class="ml-2 text-2xl font-mono font-bold text-gray-300">
                    Sky
                </span>

                <span class="text-2xl font-mono font-bold text-gray-400">
                    Code
                </span>
            </div>

            <div class="mt-2 flex items-center">
                <span class="text-sm font-sans font-bold text-gray-200">
                    PT. SkyCode - Bekasi
                </span>
            </div>
        </div>

        <hr class="border-gray-600 mt-2">

        <div class="overflow-auto h-screen flex flex-col justify-between flex-1 mt-1">
            <nav>
                <!-- dashboard -->
                <div class="nav-item mb-1
                    flex items-center px-2 py-1 text-white rounded-md transition-colors duration-200 transform hover:bg-blue-600
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>

                    <span class="ml-2 font-medium">Dashboards</span>
                </div>

                <!-- admins -->
                <div class="item-center mt-2 text-white mx-2 font-medium">
                    <span class="font-bold">Admins</span>
                </div>

                <!-- users -->
                <div class="nav-item mb-1
                    flex items-center px-2 py-1 text-white rounded-md transition-colors duration-200 transform hover:bg-blue-600
                ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                    <span class="ml-2 font-medium">Users</span>
                </div>

                <!-- roles -->
                <div class="nav-item mb-1
                    flex items-center px-2 py-1 text-white rounded-md transition-colors duration-200 transform hover:bg-blue-600
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="ml-2 font-medium">Roles</span>
                </div>

                <!-- permissions -->
                <div class="nav-item mb-1
                    flex items-center px-2 py-1 text-white rounded-md transition-colors duration-200 transform hover:bg-blue-600
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                    </svg>
                    <span class="ml-2 font-medium">Permissions</span>
                </div>

                <!-- company -->
                <div class="nav-item mb-1">
                    <Link
                        :href="route('admin.companys.index')"
                        class="nav-item"
                        :class="
                            route().current('admin.companys.*')
                            ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                            : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                        "
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="ml-2 font-medium">Company</span>
                    </Link>
                </div>

            </nav>
        </div>

    </aside>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link
    },
    props: ["openNav"],
}
</script>
