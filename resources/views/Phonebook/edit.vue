<!-- edit.vue -->
<template>
    <form @submit.prevent="update">
        <input v-model="name" type="text">

        /** @TODO: Add input fields */

        <button type="submit">Update</button>
    </form>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";

export default {
    props: ['phonebook'],
    data() {
        return {
            name: this.phonebook.name,
            /** @TODO: Add input fields */
        }
    },
    methods: {
        update() {
            Inertia.post("/phonebook/" + this.phonebook.id, {
                _method: 'put',
                name: this.name,
                /** @TODO: Add input fields */
            });
        }
    }
}
</script>
