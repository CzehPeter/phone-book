<script>

import {ref} from "vue";

export default {
    name: 'PhonebookTable',
    props: ['tableHead', 'tableContent', 'maxPageRows', 'maxPages', 'currentPage', 'search'],

    data($props) {

        return {
            tableHead: $props.tableHead ?? [],
            tableContent: $props.tableContent ?? [],
            maxPageRows: $props.maxPageRows ?? 50,
            maxPages: $props.maxPages ?? 0,
            currentPage: $props.currentPage ?? 1,
            search: $props.search ?? '',
        }
    },
    mounted() {
        this.loadTable(
            this.getCurrentPage(),
            this.getSearch()
        );
    },
    methods: {
        getCurrentPage() {
            return 1;
        },
        getSearch() {
            return '';
        },
        loadTable(currentPage = 1, search = '') {
            axios.post(`/phonebook/load`, {
                searchKey: '',
                page: 1,
                orderBy: 'phonebook.name',
                orderDirection: 'asc',
                perPage: 50
            }).then(response => {
                this.tableContent = response.data;
                console.log('LOAD', this.tableContent);
            })
                .catch(error => {
                    console.log(error);
                });


        },
        deletePhonebook(phonebookID) {
            /** @TODO: DELETE phonebook action */
            console.log('DELETE', phonebookID);

        },
        editPhonebook(phonebookID) {
            /** @TODO: EDIT phonebook action */
            console.log('EDIT', phonebookID);
        },


    },

};

</script>

<template>
    <div class="p-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-b-2xl shadow-3xl shadow">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"
                        v-for="tableHeadRow in tableHead" :key="tableHeadRow.key">
                        {{ tableHeadRow.name }}
                    </th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    v-for="tableRow in tableContent" :key="tableRow.id">
                    <td class="px-6 py-4"
                        v-for="tableHeadRow in tableHead" :key="tableHeadRow.key">
                        {{ tableRow[tableHeadRow.key] ?? 'EMPTY' }}
                    </td>

                    <td class="px-6 py-4">
                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" @click="this.deletePhonebook(tableRow['id'])">Delete</button>
                        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900" @click="this.editPhonebook(tableRow['id'])">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</template>
