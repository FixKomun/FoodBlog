<template>
    <div>
        <div class="card-body">
            <form class="recipe-form" @submit.prevent="storeRecipe">
                <div class="form-group create row">
                    <label
                        for="title"
                        class="col-md-4 col-form-label text-md-right"
                        >Title</label
                    >
                    <div class="col-md-4">
                        <input
                            v-model="form.title"
                            type="text"
                            id="title"
                            class="form-control"
                            required
                        />
                    </div>
                </div>
                <div class="form-group create row">
                    <label
                        for="description"
                        class="desc-col col-md-4 col-form-label text-md-right"
                        >Description</label
                    >
                    <div class="col-md-4">
                        <textarea
                            v-model="form.description"
                            class="form-control"
                            id="description"
                            rows="3"
                        ></textarea>
                    </div>
                </div>
                <div class="form-group create row">
                    <label
                        for="number_of_poeple"
                        class="desc-col col-md-4 col-form-label text-md-right"
                        >Number of People</label
                    >
                    <div class="col-md-4 col-form-label text-md-right">
                        <select
                            v-model.number="form.number_of_people"
                            type="number"
                            class="form-control"
                            id="number_of_people"
                        >
                            <option selected disabled
                                >For how many people is this meal?</option
                            >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">More than 6</option>
                        </select>
                    </div>
                </div>

                <div class="form-group time row">
                    <label for="prep_time" class="col-form-label text-md-right"
                        >Preparation Time</label
                    >
                    <div class="col-md-4">
                        <input
                            v-model="form.prep_time"
                            type="number"
                            id="prep_time"
                            class="form-control"
                            required
                        />
                    </div>
                    <label for="cook_time" class="col-form-label text-md-right"
                        >Cooking Time</label
                    >
                    <div class="col-md-4">
                        <input
                            v-model="form.cook_time"
                            type="number"
                            id="cook_time"
                            class="form-control"
                            required
                        />
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        for="difficulty"
                        class="col-md-4 col-form-label text-md-right"
                        >Difficulty</label
                    >

                    <div class="col-md-4">
                        <select
                            v-model="form.difficulty_id"
                            name="difficulty"
                            class="form-control"
                        >
                            <option selected disabled
                                >How complex is the meal?</option
                            >
                            <option
                                v-for="difficulty in difficulties"
                                :key="difficulty.id"
                                :value="difficulty.id"
                                selected
                                >{{ difficulty.difficulty }}</option
                            >
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        for="country"
                        class="col-md-4 col-form-label text-md-right"
                        >Country</label
                    >

                    <div class="col-md-4">
                        <select
                            v-model="form.country_id"
                            name="country"
                            class="form-control"
                        >
                            <option selected disabled
                                >From which country the meal originate?</option
                            >
                            <option
                                v-for="country in countries"
                                :key="country.id"
                                :value="country.id"
                                selected
                                >{{ country.country }}</option
                            >
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        for="typesOfMeal"
                        class="col-md-4 col-form-label text-md-right"
                        >Type of Meal</label
                    >

                    <div class="col-md-4">
                        <select
                            v-model="form.type_of_meal_id"
                            name="typesOfMeal"
                            class="form-control"
                        >
                            <option selected disabled>Type of Meal?</option>
                            <option
                                v-for="typeOfMeal in typesOfMeal"
                                :key="typeOfMeal.id"
                                :value="typeOfMeal.id"
                                selected
                                >{{ typeOfMeal.type }}</option
                            >
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-4">
                        <button
                            type="submit"
                            class="btn btn-secondary float-right"
                        >
                            Create Recipe
                        </button>
                    </div>
                </div>
            </form>

            <div class="form-group row">
                <input type="file" @change="onFileSelected" />
                <button @click="onUpload" class="btn btn-secondary float-right">
                    Upload Photo
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedFile: null,
            difficulties: [],
            countries: [],
            typesOfMeal: [],
            form: {
                title: "",
                description: "",
                number_of_people: "",
                prep_time: "",
                cook_time: "",
                image_path: "",
                difficulty_id: "",
                country_id: "",
                type_of_meal_id: ""
            }
        };
    },
    created() {
        this.getDifficulties();
        this.getCountries();
        this.getTypesOfMeal();
    },
    methods: {
        getDifficulties() {
            axios
                .get("/api/recipes/difficulties")
                .then(res => {
                    this.difficulties = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getCountries() {
            axios
                .get("/api/recipes/countries")
                .then(res => {
                    this.countries = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getTypesOfMeal() {
            axios
                .get("/api/recipes/types_of_meal")
                .then(res => {
                    this.typesOfMeal = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        storeRecipe() {
            axios
                .post("/api/recipes", {
                    title: this.form.title,
                    description: this.form.description,
                    number_of_people: this.form.number_of_people,
                    prep_time: this.form.prep_time,
                    cook_time: this.form.cook_time,
                    image_path: this.form.image_path,
                    difficulty_id: this.form.difficulty_id,
                    country_id: this.form.country_id,
                    type_of_meal_id: this.form.type_of_meal_id
                })
                .then(res => {
                    this.$router.push({ name: "RecipesIndex" });
                });
        },
        onFileSelected(event) {
            console.log(event);
            this.selectedFile = event.target.files[0];
        },
        onUpload() {
            const fd = new FormData();
            fd.append("image", this.selectedFile, this.selectedFile.name);
            axios.post("/api/recipes", fd).then(res => {
                console.log(res);
            });
        }
    }
};
</script>

<style lang="scss">
.col-md-4 {
    padding-left: 0;
}
.desc-col {
    display: grid;
    align-self: center;
}
.time {
    display: flex;
    justify-content: center;
    .col-md-4 {
        max-width: 200px;
    }
    label {
        padding-right: 1rem;
    }
}
</style>
