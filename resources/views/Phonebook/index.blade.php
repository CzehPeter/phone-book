<script>

import {Head} from '@inertiajs/vue3';
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
    },
    {
        name: 'Actions',
        key: 'actions',
    },
];

export default {
    components: {
        PhonebookTable,
    },

    props: ['tableHead', 'tableContent', 'maxPageRows', 'maxPages', 'currentPage', 'search'],

    setup() {
        return {
            tableHead: phonebookTableHead,
            tableContent: [],
            maxPageRows: 50,
            maxPages: 0,
            currentPage: 1,
            search: '',
        }
    }
};
</script>

<template>
    <div>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                /** @TODO: CHANGE fields */
                <th>Actions</th>
            </tr>
            </thead>

            <!-- Table body -->
            <tbody>
            <tr v-for="phonebookRow in phonebookData" :key="phonebookRow.id">
                <td>phonebookRow.name</td>
                <td>number.phone_number</td>


                /** @TODO: CHANGE fields */
                <td>
                    <button @click="deletePhonebookEntry(phonebookRow.id)">Delete</button>
                    <button @click="editPhonebookEntry(phonebookRow)">Edit</button>
                </td>
            </tr>
            </tbody>
        </table>

        /** @TODO: Pagination */
    </div>
</template>


