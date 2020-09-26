<template>
    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert style="z-index: 0" :hidden-content.sync="hidden">
                        <template #icon>
                            <i class='bx bxs-info-circle'></i>
                        </template>
                        <template #title>
                            Admin Accounts
                        </template>
                        Using Admin Panel Can Edit And Add Every Component
                    </vs-alert>
                </div>
            </template>
        </div>

        <div class="card-body">

            <Menubar style="margin-bottom: 10px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px">
                <template #start>
                    <img alt="logo" src="./../../images/user.png" height="40px" class="p-mr-2">
                </template>
                <template #end>
                    <span class="p-input-icon-left">
                        <router-link style="color: white" to="/admin-add">
                            <vs-button
                                icon
                                floating
                                success
                            >
                                <i class='bx bx-plus' ></i> Add New Admin
                            </vs-button>
                        </router-link>
                    </span>
                </template>
            </Menubar>

            <vs-table
                striped
                v-model="selected">

<!--            todo:header-->
                <template #header>
                    <vs-input v-model="search" border placeholder="Search" />
                </template>

                <template #thead>
                    <vs-tr>
<!--                        todo:base-->
                        <vs-th>
                            <vs-checkbox
                                :indeterminate="selected.length === users.length" v-model="allCheck"
                                @change="selected = $vs.checkAll(selected, users)"
                            />
                        </vs-th>

<!--                        todo:base-->
                        <vs-th
                            sort @click="users = $vs.sortData($event ,users, 'id')">
                            Id
                        </vs-th>

                        <vs-th
                            sort @click="users = $vs.sortData($event ,users, 'name')">
                            Name
                        </vs-th>
                        <vs-th
                            sort @click="users = $vs.sortData($event ,users, 'email')">
                            Email
                        </vs-th>

                        <vs-th>
                            Avatar
                        </vs-th>

<!--                        todo:base-->
                        <vs-th>
                            Created At
                        </vs-th>

<!--                        todo:base-->
                        <vs-th>
                            Edit
                        </vs-th>

<!--                        todo:base-->
                        <vs-th>
                            Delete
                        </vs-th>

                    </vs-tr>
                </template>

                <template #tbody>

                    <vs-tr
                        :key="i"
                        v-for="(tr, i) in $vs.getPage($vs.getSearch(users, search), page, max)"
                        :data="tr"
                        :is-selected="!!selected.includes(tr)"
                    >

<!--                        todo:base-->
                        <vs-td checkbox>
                            <vs-checkbox :val="tr" v-model="selected" />
                        </vs-td>

<!--                        todo:base-->
                        <vs-td>
                            {{ tr.id }}
                        </vs-td>

                        <vs-td>
                            {{ tr.name }}
                        </vs-td>
                        <vs-td>
                            {{ tr.email }}
                        </vs-td>

                        <vs-td>
                            <img src="../../images/user.png" alt="" style="margin-right: 3px"  width="30px"/>
                            Ayman
                        </vs-td>

                        <vs-td>
                            12-9-2020 15:00
                        </vs-td>

                        <vs-td>
                            <vs-button
                                circle
                                icon
                                floating
                                size="small"
                                primary
                            >
                                <i class='bx bx-edit' ></i>
                            </vs-button>
                        </vs-td>

                        <vs-td>
                            <vs-button
                                circle
                                icon
                                floating
                                size="small"
                                danger
                            >
                                <i class='bx bx-trash' ></i>
                            </vs-button>
                        </vs-td>

                    </vs-tr>
                </template>
            </vs-table>
            <vs-pagination progress  style="margin-top:10px" v-model="page" :length="$vs.getLength(users, max)" />
<!--            todo:base-->
            <span class="data">
                <pre hidden>
                    {{ selected.length > 0 ? selected : 'Select an item in the table' }}
                </pre>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "List",
    data() {
        return {
            hidden:false,
            search: '',
            allCheck: false,
            page: 1,
            max: 10,
            selected: [],
            users: [
                {
                    "id": 1,
                    "name": "Leanne Graham",
                    "username": "Bret",
                    "email": "Sincere@april.biz",
                    "website": "hildegard.org",
                },
                {
                    "id": 2,
                    "name": "Ervin Howell",
                    "username": "Antonette",
                    "email": "Shanna@melissa.tv",
                    "website": "anastasia.net",
                },
                {
                    "id": 3,
                    "name": "Clementine Bauch",
                    "username": "Samantha",
                    "email": "Nathan@yesenia.net",
                    "website": "ramiro.info",
                },
                {
                    "id": 4,
                    "name": "Patricia Lebsack",
                    "username": "Karianne",
                    "email": "Julianne.OConner@kory.org",
                    "website": "kale.biz",
                },
                {
                    "id": 5,
                    "name": "Chelsey Dietrich",
                    "username": "Kamren",
                    "email": "Lucio_Hettinger@annie.ca",
                    "website": "demarco.info",
                },
                {
                    "id": 6,
                    "name": "Mrs. Dennis Schulist",
                    "username": "Leopoldo_Corkery",
                    "email": "Karley_Dach@jasper.info",
                    "website": "ola.org",
                },
                {
                    "id": 7,
                    "name": "Kurtis Weissnat",
                    "username": "Elwyn.Skiles",
                    "email": "Telly.Hoeger@billy.biz",
                    "website": "elvis.io",
                },
                {
                    "id": 8,
                    "name": "Nicholas Runolfsdottir V",
                    "username": "Maxime_Nienow",
                    "email": "Sherwood@rosamond.me",
                    "website": "jacynthe.com",
                },
                {
                    "id": 9,
                    "name": "Glenna Reichert",
                    "username": "Delphine",
                    "email": "Chaim_McDermott@dana.io",
                    "website": "conrad.com",
                },
                {
                    "id": 10,
                    "name": "Clementina DuBuque",
                    "username": "Moriah.Stanton",
                    "email": "Rey.Padberg@karina.biz",
                    "website": "ambrose.net",
                },
                {
                    "id": 11,
                    "name": "Clementina DuBuque",
                    "username": "Moriah.Stanton",
                    "email": "Rey.Padberg@karina.biz",
                    "website": "ambrose.net",
                },
                {
                    "id": 12,
                    "name": "Clementina DuBuque",
                    "username": "Moriah.Stanton",
                    "email": "Rey.Padberg@karina.biz",
                    "website": "ambrose.net",
                },
                {
                    "id": 13,
                    "name": "Clementina DuBuque",
                    "username": "Moriah.Stanton",
                    "email": "Rey.Padberg@karina.biz",
                    "website": "ambrose.net",
                },
                {
                    "id": 14,
                    "name": "Clementina DuBuque",
                    "username": "Moriah.Stanton",
                    "email": "Rey.Padberg@karina.biz",
                    "website": "ambrose.net",
                }
            ]
        }
    },
    created() {
    },
    mounted() {
    },
    methods: {
    }
}
</script>

<style scoped>

</style>
