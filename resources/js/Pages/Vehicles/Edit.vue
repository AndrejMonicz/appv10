<template>
    <div>
        <h1>Редактировать транспортное средство</h1>
        <!-- Форма редактирования ТС -->
        <form @submit.prevent="submitForm">
            <div>
                <label>Тип:</label>
                <input type="text" v-model="type" />
            </div>
            <div>
                <label>Номерной знак:</label>
                <input type="text" v-model="licensePlate" />
            </div>
            <!-- Остальные поля формы -->
            <button type="submit">Сохранить</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        vehicle: Object,
    },
    data() {
        return {
            type: '',
            licensePlate: '',
            // Другие поля формы
        };
    },
    created() {
        // Заполнение полей формы текущими значениями ТС
        this.type = this.vehicle.type;
        this.licensePlate = this.vehicle.licensePlate;
        // Заполнение других полей формы
    },
    methods: {
        submitForm() {
            // Обработка отправки формы
            const formData = {
                type: this.type,
                licensePlate: this.licensePlate,
                // Другие поля формы
            };
            this.$inertia.put(`/vehicles/${this.vehicle.id}`, formData);
        },
    },
};
</script>


<style scoped>

</style>
