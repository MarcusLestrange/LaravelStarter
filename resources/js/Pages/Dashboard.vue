<template>
	<p>Текущее время: {{ current_time }}</p>
	<v-btn variant="outlined" prepend-icon="mdi-home" >Dashboboard</v-btn>
	<v-divider class="my-5"/>
	<p>appStore.count: {{ appStore.count }} | {{ appStore.getCurrentCount() }}</p>
	<p>appStore.doubleCount: {{ appStore.doubleCount }}</p>
	<v-btn variant="outlined" @click="appStore.increment()">Increment</v-btn>
	<v-btn variant="outlined" @click="appStore.randomizeCounter()">Random</v-btn>
</template>

<script>
import {useAppStore} from "@/stores/appStore.js";

export default {
	components: {},
	data() {
		return {
			appStore: useAppStore(),
		}
	},
	props: {
		current_time: { type: String, required: true },
	},
}
</script>
