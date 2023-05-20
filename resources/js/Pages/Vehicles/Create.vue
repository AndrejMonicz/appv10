<template>
    <div class="w-full mx-auto pt-2 mx-5">
        <h1 class="text-lg mb-4">Создать новое транспортное средство</h1>
        <!-- Форма создания нового ТС -->
        <form @submit.prevent="store">
            <div class="mb-2">
                <input type="text" placeholder="Тип" v-model="vehicleType"
                class="border-gray-400 rounded-full float-left mr-2"/>
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Владелец" v-model="companyOwner"
                class="border-gray-400 rounded-full float-left mr-2"/>
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Бортовой номер" v-model="boardNumber"
                class="border-gray-400 rounded-full float-left mr-2"/>
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Рег номер" v-model="licensePlate"
                class="border-gray-400 rounded-full float-left mr-2"/>
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Марка" v-model="brandVehicle"
                class="border-gray-400 rounded-full mr-2"/>
            </div>
            <div class="mb-2">
                <textarea type="text" placeholder="Другие отметки" v-model="description"
                class="w-3/12 h-20 rounded-lg"></textarea>
            </div>
            <!-- Остальные поля формы -->
            <button type="submit"
                    class="hover:bg-white hover:text-sky-500 border border-sky-500 block p-1 m-3 w-32 bg-sky-500 rounded-full text-center text-white">
                Сохранить
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            vehicleType: '',
            companyOwner: '',
            boardNumber: '',
            licensePlate: '',
            brandVehicle: '',
            description: '',
            // Другие поля формы
        };
    },
    methods: {
        submitForm() {
            // Обработка отправки формы
            const formData = {
                vehicleType: this.vehicleType,
                companyOwner: this.companyOwner,
                boardNumber: this.boardNumber,
                licensePlate: this.licensePlate,
                brandVehicle: this.brandVehicle,
                description: this.description,
                // Другие поля формы
            };
            this.$inertia.post('/vehicles', formData);
        },
    },
};
</script>

<style scoped>

</style>
