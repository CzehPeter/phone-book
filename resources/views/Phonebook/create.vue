<!-- create.vue -->
<template>
    <form @submit.prevent="store">
        <input v-model="name" type="text">

        /** @TODO: Add input fields */

        <button type="submit">Save</button>
    </form>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";
export default {
    data() {
        return {
            name: "",
            /** @TODO: Add input fields */
        }
    },
    methods: {
        store() {
            Inertia.post("/phonebook", {
                name: this.name,
                /** @TODO: Add input fields */
            })
        }
    }
}
</script>
