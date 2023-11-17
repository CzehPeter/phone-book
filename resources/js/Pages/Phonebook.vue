<script>

import {Head,Link} from '@inertiajs/vue3';
import PhonebookTable from "@/Components/PhonebookTable.vue";

const phonebookTableHead = [
    {
        name: 'Name',
        key: 'name',
    },
    {
        name: 'Phone',
        key: 'phone_number',
    },
    {
        name: 'Email',
        key: 'email',
    },
    {
        name: 'Address',
        key: 'address',
    }
];

export default {
    components: {
        PhonebookTable,
    },

    props: ['tableHead', 'tableContent', 'maxPageRows', 'maxPages', 'currentPage', 'search'],

    setup() {
        return {
            //
            tableHead: phonebookTableHead,
            tableContent: [],
            maxPageRows: 50,
            maxPages: 0,
            currentPage: 1,
            search: '',
        }
    }
}
</script>


<!-- index.vue -->
<template>
    <div
        class="relative sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <Head title="Phonebook"/>

        <PhonebookTable
            :tableHead="tableHead"
            :tableContent="tableContent"
            :maxPageRows="maxPageRows"
            :maxPages="maxPages"
            :currentPage="currentPage"
            :search="search"
        />
    </div>
</template>


