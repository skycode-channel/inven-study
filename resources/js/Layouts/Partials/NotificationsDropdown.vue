<template>
    <div class="flex">
        <div class="relative">
            <jet-dropdown align="right" width="96">
                <template #trigger>
                    <button class="inline-block relative text-gray-200 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>

                        <div v-if="notifications.count !== 0"
                            class="absolute top-1 right-1 -mr-1 -mt-1 w-3 h-3 rounded-full bg-yellow-300 animate-ping" />
                        <div v-if="notifications.count !== 0"
                            class="absolute top-1 right-1 -mr-1 -mt-1 w-3 h-3 rounded-full bg-yellow-300" />
                    </button>
                </template>

                <template #content>
                    <div class="flex justify-between items-center py-2 px-4 text-sm border-b border-gray-200">
                        <div class="text-gray-400 font-bold">
                            Notifications
                        </div>
                        <span v-if="notifications.count !== 0"
                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ notifications.count }}
                        </span>
                    </div>

                    <div v-if="notifications.count !==0" v-for="notification in notifications.list"
                        :key="notification.id" class="fkex text-gray-600 border-b border-gray-200">
                        <Link class="w-full flex py-3 px-4 hover:bg-gray-100">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-green-200 justify-center items-center flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-green-800">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-600 text-sm mb-1">
                                {{ notification.data['header'] }}
                            </div>
                            <div class="text-gray-600 text-sm mb-1">
                                <span class="font-semibold text-gray-900">
                                    {{ notification.data['user_name'] }}
                                </span> : "{{ notification.data['title'] }}"
                            </div>
                            <div class="text-xs text-blue-800">
                                Created : {{ moment(notification.created_at).fromNow() }}
                            </div>
                        </div>
                        </Link>
                    </div>

                    <div class="border-t border-gray-100" />

                    <div v-if="notifications.count !== 0">
                        <div class="flex justify-between items-center py-2 px-4 text-sm text-gray-600 font-bold">
                            <span class="hover:text-gray-400">
                                <Link>
                                View all
                                </Link>
                            </span>

                            <button @click.prevent="markAllAsRead" class="hover:text-gray-400">
                                <Link>
                                Mark all as read
                                </Link>
                            </button>
                        </div>
                    </div>
                    <div v-else class="items-center py-2 px-4 text-sm text-gray-600 font-bold">
                        <span class="hover:text-gray-400">
                            <Link>
                            View all
                            </Link>
                        </span>
                    </div>
                </template>
            </jet-dropdown>
        </div>
    </div>
</template>

<script>
import JetDropdown from '@/Jetstream/Dropdown.vue'
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';
import moment from "moment";

export default {
    components: {
        Link,
        JetDropdown,
    },
    props: ['user'],
    data() {
        return {
            notifications: [],
            moment: moment,
        }
    },

    mounted() {
        this.loadNotifications();

        let pusher = new Pusher('c7c640d155db8123d0d5', {
            cluster: 'eu',
            encrypted: false
        });

        let channel = pusher.subscribe('my-channel')

        channel.bind('my-event', (data) => {
            this.loadNotifications();
        })
    },

    methods: {
        loadNotifications() {
            axios.get(this.route('notification.noties.info'))
                .then((response) => {
                    this.notifications = JSON.parse(response.data);
                });
        },
        markAllAsRead() {
            axios.post(this.route('notification.noties.mark-all-as-read'))
                .then(() => {
                    this.loadNotifications();
                })
        }
    }
}
</script>