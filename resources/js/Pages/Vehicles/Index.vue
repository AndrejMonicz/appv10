<template>
    <div class="w-full mx-auto pt-2">
        <h1 class="text-lg">Список транспортных средств</h1>
        <Link
            :href="route('vehicles.create')"
                class="hover:bg-white hover:text-sky-950 border border-sky-500 block p-1 m-3 w-32 bg-sky-500 rounded-full text-center text-white">
            Новое ТС
        </Link>

        <table v-if="vehicles" class="table table-sm table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-sm-1">id</th>
                    <th scope="col" class="col-sm-1">Тип ТС</th>
                    <th scope="col" class="col-sm-1">Владелец</th>
                    <th scope="col" class="col-sm-2">Бортовой номер</th>
                    <th scope="col" class="col-sm-2">Рег номер</th>
                    <th scope="col" class="col-sm-2">Марка</th>
                    <th scope="col" class="col-sm-2">Заметки</th>

                </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm пример">
                        <option selected>Откройте это меню выбора</option>
                        <option value="1"
                        >

                        </option>
                    </select>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
                <tr v-for="vehicle in vehicles" :key="vehicle.id">
                    <th scope="row">{{vehicle.id}}</th>
                    <td>{{vehicle.vehicle_type}}</td>
                    <td>{{vehicle.company_title}}</td>
                    <td>{{vehicle.board_number}}</td>
                    <td>{{vehicle.license_plate}}</td>
                    <td>{{vehicle.brand_vehicle}}</td>
                    <td>{{vehicle.description}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",

    props: ['vehicles'],

    components: {
        Link
    }
};
</script>

<style scoped>

</style>
