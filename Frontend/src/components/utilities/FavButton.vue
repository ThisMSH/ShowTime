<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps(["fav"]);

const isFav = ref(false);
onMounted(() => {
    isFav.value = props.fav ? true : false;
})
</script>

<template>
    <div>
        <input type="checkbox" :checked="isFav" :id="`my-favorite-${fav?.id ?? 'show'}`" name="favorite-checkbox" value="favorite-button" class="my-favorite">
        <label :for="`my-favorite-${fav?.id ?? 'show'}`" class="fav-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg>
            <div class="action">
                <span class="option-1">Add to Favorites</span>
                <span class="option-2">Added to Favorites</span>
                <span class="option-3">Remove from Favorites</span>
            </div>
        </label>
    </div>
</template>

<style scoped>
.fav-label {
    background-color: white;
    width: fit-content;
    max-width: 250px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    padding: 10px 15px 10px 10px;
    cursor: pointer;
    user-select: none;
    border-radius: 10px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    color: black;
    transition: 0.3s;
}

.my-favorite {
    display: none;
}

.my-favorite:hover + .fav-label {
    background-color: rgb(255, 205, 205);
    box-shadow: rgba(255, 193, 193, 0.3) 0px 8px 16px;
}

.my-favorite:checked:hover + .fav-label {
    background-color: rgb(217, 230, 248);
    box-shadow: rgba(144, 153, 161, 0.5) 0px 8px 16px;
}

.my-favorite:checked + .fav-label svg {
    fill: rgb(255, 0, 0);
    stroke: rgb(255, 0, 0);
    animation: heartButton 1s;
}

.my-favorite:checked:hover + .fav-label svg {
    fill: rgb(148 163 184);
    stroke: rgb(148 163 184);
}

@keyframes heartButton {
    0% {
        transform: scale(1);
    }

    25% {
        transform: scale(1.3);
    }

    50% {
        transform: scale(1);
    }

    75% {
        transform: scale(1.3);
    }

    100% {
        transform: scale(1);
    }
}

.my-favorite + .fav-label .action {
    position: relative;
    overflow: hidden;
    display: grid;
    justify-items: center;
    align-items: center;
    text-align: center;
}

.my-favorite + .fav-label .action span {
    grid-column-start: 1;
    grid-column-end: 1;
    grid-row-start: 1;
    grid-row-end: 1;
    transition: all .5s;
}

.my-favorite + .fav-label .action span.option-1 {
    transform: translate(0px, 0%);
    opacity: 1;
}

.my-favorite:checked + .fav-label .action span.option-1 {
    transform: translate(0px, -100%);
    opacity: 0;
}

.my-favorite + .fav-label .action span.option-2 {
    transform: translate(0px, 100%);
    opacity: 0;
}

.my-favorite:checked + .fav-label .action span.option-2 {
    transform: translate(0px, 0%);
    opacity: 1;
}

.my-favorite + .fav-label .action span.option-3 {
    transform: translate(0px, 100%);
    opacity: 0;
}

.my-favorite:checked:hover + .fav-label .action span.option-3 {
    transform: translate(0px, 0%);
    opacity: 1;
}

.my-favorite:checked:hover + .fav-label .action span.option-2 {
    transform: translate(0px, -100%);
    opacity: 0;
}
</style>
