<template>
    <nav class="w-full bg-gray-700 drop-shadow-xl print:hidden">
        <div class="max-w-screen-2xl mx-auto">
            <div class="grid grid-cols-2 py-1 px-2">
                <div class="col-start-1 flex flex-wrap content-center">
                    <button type="button" class="text-gray-200 hover:text-gray-500" arial-label="toggle menu"
                        @click="$emit('toggleNav')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div class="col-end-12">
                    <ul class="flex items-center flex-shrink-0 space-x-2 lg:space-x-6">
                        <li class="relative">
                            <NotificationsDropdown :user="$page.props.auth.user" />
                        </li>
                        <li class="relative">
                            <AccountDropdown />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import AccountDropdown from "./AccountDropdown";
import NotificationsDropdown from "./NotificationsDropdown";

export default {
    components: {
        AccountDropdown,
        NotificationsDropdown
    },
}
</script>
