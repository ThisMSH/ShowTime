<script setup>
import DarkMode from '../components/DarkMode.vue';
import { ref, onMounted } from 'vue';

let cursor = ref(null);
let cursorPosition = ref(null);



onMounted(() => {
    cursorPosition.addEventListener("mousemove", function (event) {
        let x = event.clientX;
        let y = event.clientY;
    
        cursor.value.style.left = x + 'px';
        cursor.value.style.top = y + 'px';
    }
)
})
</script>

<template>
    <DarkMode class="absolute top-10 left-10 z-50" />
    <main ref="cursorPosition" class="min-h-screen overflow-hidden">
        <div class="cont relative h-screen overflow-hidden">
            <div ref="cursor" class="cursor absolute w-[500px] h-[500px] rounded-full transition-all -translate-x-1/2 -translate-y-1/2 invisible"></div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
            <div class="rows inline-flex -m-8 -ml-[50px] child:relative child:w-[100px] child:h-[110px] child:m-px child:transition-all child:duration-[2s] child:bg-gradient-to-l child:from-slate-100 child:dark:from-slate-800 child:to-slate-200 child:dark:to-slate-950 child:hover:duration-0 ">
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
                <div class="hexagonal"></div>
            </div>
        </div>
    </main>
    <!-- <div class="hexa-container absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110vw] h-[110vh] flex flex-wrap justify-center items-center child:bg-black child:w-20 child:h-20 child:block child:relative ">
        <span>
            <div class="hexa-bg w-full h-full absolute top-0 left-0"></div>
            <div class="hexa w-full h-[58%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
            <div class="hexa w-full h-[58%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rotate-[60deg]"></div>
            <div class="hexa w-full h-[58%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rotate-[120deg]"></div>
        </span>
    </div> -->
    
</template>

<style scoped>
/* .hexa {
    background: #000;
}
.hexa-container > span {
    animation: colorful 20s linear infinite;
    transition: 0.5s ease-in-out;
}
.hexa-container > span:hover {
    transition: 0s ease-in-out;
} */
.rows > div {
    clip-path: polygon(50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%, 0 25%);
}
.rows:nth-child(2n) {
    margin-left: 1px;
}
.cursor {
    animation: hue 3s linear infinite;
}
main:hover .cursor {
    /* background: radial-gradient(circle, rgba(0,0,255,1) 25%, rgba(0,0,0,0.1) 100%); */
    background: radial-gradient(circle, rgba(255,0,0,1) 0%, rgba(0,0,255,0.8) 50%, rgba(255,255,0,0.6) 100%);
    visibility: visible;
}

@keyframes hue {
    0% {
        filter: hue-rotate(0deg);
    }
    100% {
        filter: hue-rotate(360deg);
    }
}

@keyframes colorful {
    0% {
        background-color: white;
    }
    12.5% {
        background-color: red;
    }
    25% {
        background-color: yellow;
    }
    37.5% {
        background-color: green;
    }
    50% {
        background-color: blue;
    }
    62.5% {
        background-color: orange;
    }
    75% {
        background-color: violet;
    }
    87.5% {
        background-color:springgreen
    }
    100% {
        background-color: black;
    }
}
</style>
