<template>
    <div class="absolute w-6 h-6 child:absolute child:w-7 child:h-2 child:opacity-0 child:before:absolute child:before:top-0 child:before:left-0 child:before:skew-y-[30deg] child:before:h-full child:before:w-[51%] child:before:bg-white child:after:absolute child:after:top-0 child:after:right-0 child:after:w-1/2 child:after:h-full child:after:skew-y-[-30deg] child:after:bg-white">
        <div class="chevron"></div>
        <div class="chevron"></div>
        <div class="chevron"></div>
    </div>
</template>

<style>
.chevron {
  animation: move 3s ease-out infinite;
}

.chevron:first-child {
  animation: move 3s ease-out 1s infinite;
}

.chevron:nth-child(2) {
  animation: move 3s ease-out 2s infinite;
}

@keyframes move {
  25% {
    opacity: 1;

  }
  33% {
    opacity: 1;
    transform: translateY(30px);
  }
  67% {
    opacity: 1;
    transform: translateY(40px);
  }
  100% {
    opacity: 0;
    transform: translateY(55px) scale3d(0.5, 0.5, 0.5);
  }
}
</style>
