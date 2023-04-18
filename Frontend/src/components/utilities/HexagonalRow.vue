<template>
    <div
        class="rows inline-flex -m-8 -ml-[50px] even:ml-0.5 child:relative child:bg-white child:dark:bg-black child:w-[100px] child:h-[110px] child:m-0.5 child:hue-rotate-0 child:transition-all child:duration-1000 child-hover:bg-[#0F0] child-hover:dark:bg-[#0F0] child-hover:duration-0 child:before:absolute child:before:inset-1 child:before:dark:bg-neutral-900 child:before:bg-neutral-100 child:after:absolute child:after:w-1/2 child:after:h-full child:after:top-0 child:after:left-0 child:after:dark:bg-neutral-800 child:after:bg-neutral-200">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</template>

<style scoped>
.rows > div, .rows > div::before {
    clip-path: polygon(50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%, 0 25%);
}
.rows > div {
    animation: hue 4s linear infinite;
}
.rows > div::after {
    clip-path: polygon(8% 27%, 100% 4%, 100% 96%, 8% 73%);
}

@keyframes hue {
    0% {
        filter: hue-rotate(0deg);
    }
    100% {
        filter: hue-rotate(360deg);
    }
}
</style>
