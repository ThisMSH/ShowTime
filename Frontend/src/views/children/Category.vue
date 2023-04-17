<script setup>
import ShowComponent from '../../components/ShowComponent.vue';
import H2 from '../../components/utilites/H2.vue';

const animeShows = [
    {
        "title": "Fate/stay night",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657556398090/113810l.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "JJK Movie",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657350864916/119044l.jpg",
        "show_type": "Movie",
        "rating": "9.3/10"
    },
    {
        "title": "JJK S2",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657111806025/FLY4LfmacAExJK1.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Fate/Zero",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657795477534/117645l.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "JJK S1",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658017759242/109222l.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Naruto",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658256850985/111305l.jpg",
        "show_type": "Series",
        "rating": "1.3/10"
    },
    {
        "title": "One Piece",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658445578260/120243l.jpg",
        "show_type": "Series",
        "rating": "3.3/10"
    },
    {
        "title": "OPM",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658684670023/72533l.jpg",
        "show_type": "Series",
        "rating": "7.3/10"
    },
    {
        "title": "Kimetsu no Yaiba",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658860814406/120036l.jpg",
        "show_type": "Series",
        "rating": "10/10"
    },
];
</script>

<template>
    <div class="container mx-auto">
        <H2 title="Category" />
        <div class="my-40 grid gap-y-20 2xl:grid-cols-6 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 grid-cols-2">
            <div class="flex justify-center items-center" v-for="show in animeShows" :key="show.title">
                <ShowComponent :show="show" />
            </div>
        </div>
    </div>
</template>

<style>

</style>
