<template>
	<p>Текущее время: {{ current_time }}</p>
</template>

<script>
export default {
	components: {},
	props: {
		current_time: { type: String, required: true },
	},
}
</script>
