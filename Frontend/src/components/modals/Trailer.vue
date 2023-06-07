<script setup>
import { initModals } from 'flowbite';
import { onMounted } from 'vue';
import DefaultButton from '../utilities/DefaultButton.vue';

const props = defineProps(["watchID", "title"])

onMounted(() => {
    initModals();
});
</script>

<template>
    <!-- Modal toggle -->
    <DefaultButton type="button" :data-modal-target="watchID" :data-modal-toggle="watchID" :name="title" iconName="line-md:play" />
    <!-- Main modal -->
    <div :id="watchID" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative max-h-full max-lg:w-full">
            <div class="shadow relativ">
                <iframe class="aspect-video max-lg:w-full lg:w-[800px]" :src="`https://www.youtube-nocookie.com/embed/${watchID}`" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</template>
