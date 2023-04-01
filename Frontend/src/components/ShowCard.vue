<template>
    <div class="group relative w-96 h-96 bg-slate-600 flex items-center justify-center rounded-3xl transition-all duration-500 delay-500 hover:w-[600px] hover:delay-500">
        <div class="circle absolute top-0 left-0 w-full h-full flex justify-center items-center before:absolute before:top-0 before:left-0 before:w-96 before:h-96 before:rounded-[50%] before:bg-slate-800 before:border-8 before:border-red-600 before:drop-shadow-red-10 before:drop-shadow-red-600 group-hover:before:w-full group-hover:before:h-full group-hover:before:rounded-3xl group-hover:before:bg-red-600 group-hover:before:delay-500">
            <img class="logo " src="../assets/images/Kimetsu_no_yaiba/Demon_Slayer_Logo.png" alt="">
        </div>
    </div>
</template>

<style scoped>
.circle::before {
    transition: 0.5s, background 0.5s;
    transition-delay: 0.75s, 1s;
}
</style>