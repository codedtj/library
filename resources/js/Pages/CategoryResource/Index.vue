<template>
    <b-col md="8" class="mx-auto mt-5 simple-list">
        <ul>
            <li v-for="category in categories">
                <inertia-link class="list-item" :href="route('category-resources.show',category.id)"
                   :key="category.id"> {{$t('label.' + category.name.replaceAll(' ', '_')) }}</inertia-link>
            </li>
        </ul>
    </b-col>
</template>

<script>
export default {
    name: "Index",
    props: {
        categories: Array
    }
}
</script>
