<template>
	<p>Текущее время: {{ current_time }}</p>
	<v-btn variant="outlined" prepend-icon="mdi-home" >Dashboboard</v-btn>
</template>

<script>
export default {
	components: {},
	props: {
		current_time: { type: String, required: true },
	},
}
</script>
