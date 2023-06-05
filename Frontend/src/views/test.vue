<script setup>
import DarkMode from '../components/utilities/DarkMode.vue';
import RectangularLogoDark from '../components/utilities/RectangularLogoDark.vue';
import RectangularLogoLight from '../components/utilities/RectangularLogoLight.vue';
import SquareLogoBlack from '../components/utilities/SquareLogoBlack.vue';
import SquareLogoDark from '../components/utilities/SquareLogoDark.vue';
import SquareLogoLight from '../components/utilities/SquareLogoLight.vue';
</script>

<template>
    <DarkMode class="absolute top-2 right-2"/>
    <div class="flex justify-center mt-60 gap-x-20">
        <RectangularLogoDark class="hidden" :logo-class="'w-20'" :text-class="'text-5xl'" />
        <RectangularLogoLight class="hidden" :logo-class="'w-20'" :text-class="'text-5xl'" />
        <SquareLogoDark class="hidden" :logo-class="'w-40'" :text-class="'text-5xl'" />
        <SquareLogoLight class="hidden" :logo-class="'w-40'" :text-class="'text-5xl'" />
        <SquareLogoBlack class="" :logo-class="'w-40'" :text-class="'text-5xl'" />
    </div>
</template>

<style>

</style>
