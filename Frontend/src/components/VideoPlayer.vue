<script setup>
import { ref, reactive, onMounted, nextTick } from 'vue';
import Artplayer from 'artplayer';

const props = defineProps({
    url: String,
    title: String,
    subs: { type: Array, default: [] },
});
const subsArr = ref([]);

if (props.subs[0]) {
    subsArr.value[0] = {
        default: true,
        html: props.subs[0].attributes.name,
        url: props.subs[0].attributes.file
    }
}

for (let i = 1; i < props.subs.length; i++) {
    let temp = {
        html: props.subs[i].attributes.name,
        url: props.subs[i].attributes.file
    };
    subsArr.value.push(temp);
}

const player = ref(null);
const options = reactive({
    url: props.url,
    title: props.title,
    volume: 0.5,
    isLive: false,
    muted: false,
    autoplay: false,
    pip: false,
    autoSize: true,
    autoMini: true,
    screenshot: true,
    setting: true,
    loop: false,
    flip: true,
    playbackRate: true,
    aspectRatio: true,
    fullscreen: true,
    fullscreenWeb: true,
    subtitleOffset: false,
    miniProgressBar: true,
    mutex: false,
    backdrop: true,
    playsInline: true,
    autoPlayback: true,
    airplay: true,
    theme: '#23ade5',
    lang: navigator.language.toLowerCase(),
    whitelist: ['*'],
    settings: [
        {
            width: 200,
            html: 'Subtitle',
            tooltip: props.subs[0] ? props.subs[0].attributes.name : 'none',
            icon: '<img width="22" heigth="22" src="../src/assets/images/ArtPlayer/subtitle.svg">',
            selector: [
                {
                    html: 'Display',
                    tooltip: 'Show',
                    switch: true,
                    onSwitch: function (item) {
                        item.tooltip = item.switch ? 'Hide' : 'Show';
                        this.subtitle.show = !item.switch;
                        return !item.switch;
                    },
                },
                ...subsArr.value
            ],
            onSelect: function (item) {
                this.subtitle.switch(item.url, {
                    name: item.html,
                });
                return item.html;
            },
        },
    ],
    subtitle: {
        url: props.subs[0] ? props.subs[0].attributes.file : '',
        type: 'srt',
        style: {
            color: '#fff',
            fontSize: 'max(16px, 2vw)',
        },
        encoding: 'utf-8',
    },
    icons: {
        loading: '<img src="../src/assets/images/ArtPlayer/Loading.gif">',
        state: '<img width="150" heigth="150" src="../src/assets/images/ArtPlayer/logo.png">',
        indicator: '<img width="16" heigth="16" src="../src/assets/images/ArtPlayer/indicator.svg">',
    },
});

onMounted(() => {
    nextTick(() => {
        new Artplayer({
            ...options,
            container: player.value
        });
    });
});

defineExpose({
    player,
    options
});
</script>

<template>
    <div ref="player"></div>
</template>
