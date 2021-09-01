import RecipesIndex from "./components/recipe/Index";
import RecipesCreate from "./components/recipe/Create";
import RecipesEdit from "./components/recipe/Edit";
import RecipesShow from "./components/recipe/Show";

export const routes = [
    {
        path: "/recipes",
        name: "RecipesIndex",
        component: RecipesIndex
    },
    {
        path: "/recipes/create",
        name: "RecipesCreate",
        component: RecipesCreate
    },
    {
        path: "/recipes/:id",
        name: "RecipesShow",
        component: RecipesShow
    },

    {
        path: "/recipes/:id",
        name: "RecipesEdit",
        component: RecipesEdit
    }
];
