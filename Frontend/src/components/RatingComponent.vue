<script setup>
import { onMounted, ref } from 'vue';
import { useRatingStore } from '../stores/rating';

const ratingStore = useRatingStore();

const props = defineProps(["showID"]);

const isLoading = ref(null);
const rate = ref({
    show_id: props.showID,
    rating: "selected"
});

const addUpdateRating = async () => {
    isLoading.value = true;
    await ratingStore.addUpdateRating(rate.value);
    isLoading.value = false;
};

onMounted(async () => {
    await ratingStore.fetchRating(props.showID);
    rate.value.rating = ratingStore.getRating?.data?.attributes?.rating || "selected";
});
</script>

<template>
    <div class="relative z-0 my-2">
        <div>
            <label for="underline_select" class="absolute text-slate-600 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">My Rating</label>
            <select @change="addUpdateRating" v-model="rate.rating" id="underline_select" class="block py-2.5 px-2 w-full max-md:text-sm bg-transparent border-0 border-b-2 border-slate-600 appearance-none child:bg-slate-100 child:dark:bg-slate-950 dark:border-slate-400 dark:focus:border-slate-400 focus:outline-none focus:ring-0 focus:border-slate-600 peer">
                <option disabled selected value="selected">Select</option>
                <option value="10">10 - Masterpiece</option>
                <option value="9">9 - Great</option>
                <option value="8">8 - Very good</option>
                <option value="7">7 - Good</option>
                <option value="6">6 - Fine</option>
                <option value="5">5 - Average</option>
                <option value="4">4 - Bad</option>
                <option value="3">3 - Very bad</option>
                <option value="2">2 - Horrible</option>
                <option value="1">1 - Appalling</option>
            </select>
        </div>
        <div v-if="ratingStore.isLoading || isLoading" role="status" class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full rounded-t-lg bg-black/40">
            <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>
