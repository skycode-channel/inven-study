<template>
    <admin-layout>
        <div>
            Dashboard
        </div>
    </admin-layout>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/AdminLayout";

export default {
    created() {
        document.title = "Dashboard";
    },
    components: {
        AdminLayout,
        Link
    },
}
</script>
