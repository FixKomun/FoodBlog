<template>
    <div>
        <div class="btn-create align-right">
            <router-link
                :to="{ name: 'RecipesCreate' }"
                class="btn btn-primary"
            >
                Create a new recipe
            </router-link>
        </div>
        <div v-for="recipe in recipes" :key="recipe.id" class="row recipe-row">
            <div class="col-sm-11 recipe-card">
                <img
                    class="recipe-img"
                    src="https://cdn.pixabay.com/photo/2018/07/18/19/12/pasta-3547078_960_720.jpg"
                    alt
                />
                <div class="recipe-body">
                    <h5 class="card-title">{{ recipe.title }}</h5>
                    <p class="card-description">
                        {{ recipe.description }}
                    </p>
                    <router-link
                        :to="{ name: 'RecipesShow', params: { id: recipe.id } }"
                        class="btn btn-primary"
                        >Find out more</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            recipes: []
        };
    },
    created() {
        this.getRecipes();
    },
    methods: {
        getRecipes() {
            axios
                .get("/api/recipes")
                .then(result => {
                    this.recipes = result.data.data;
                    console.log(data);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style lang="scss">
.recipe-card {
    display: flex;
    justify-content: center;
}
.recipe-img {
    width: 300px;
    object-fit: cover;
    padding: 15px;
}
.recipe-body {
    h5 {
        margin-top: 1rem;
    }
}
.btn-create {
    position: absolute;
    top: 100px;
    right: 30px;
}
</style>
