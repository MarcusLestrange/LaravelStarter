<template>
	<v-app>
		<v-overlay :model-value="overlay" class="align-center justify-center" persistent>
			<v-progress-circular color="primary" size="64" width="5" indeterminate></v-progress-circular>
		</v-overlay>

		<v-navigation-drawer temporary v-model="drawer" width="300">

			<template v-slot:prepend>
				<div class="bg-grey-darken-3">
					<div class="d-flex align-center pe-1 py-1" style="min-height: 40px">
						<div class="d-flex">
							<div class="d-flex flex-column justify-center px-2">
								Левая панель
							</div>
						</div>
						<v-btn
							icon="mdi-window-close" size="small"
							variant="text" style="position: absolute; top: 0; right: 0;"
							@click="drawer = false"
						/>
					</div>
				</div>
			</template>
			<v-divider/>

			<v-list density="compact" nav>
				<v-list-item
					v-for="(item, i) in items" :key="i" link :title="item.text"
					@click="() => { drawer = false; $inertia.get(item.url) }"
					:prepend-icon="item.icon"
				/>
			</v-list>

			<template v-slot:append>
				<div class="pa-2 border-t-sm">
					<v-btn
						block class="border-md bg-red-darken-4" prepend-icon="mdi-exit-to-app"
						size="small" @click="() => { drawer = false; }"
					>Вихід</v-btn>
				</div>
			</template>
		</v-navigation-drawer>

		<v-app-bar density="compact" scroll-behavior="collapse" height="70" class="position-relative">
			<template v-slot:prepend>
				<div class="position-absolute d-flex left-0">
					<v-app-bar-nav-icon @click.stop="drawer = !drawer"/>
				</div>
			</template>
			<template #title>
				<div class="d-flex align-center flex-column cursor-pointer lh-sm" @click="$inertia.get(route('dashboard.index'))">
					<v-icon icon="$vuetify" size="large"/>
				</div>
			</template>
			<template v-slot:append>
				<div class="position-absolute d-flex right-0">
					<v-btn icon="mdi-reload" @click="$inertia.reload()"></v-btn>
				</div>
			</template>
		</v-app-bar>

		<v-main class="pt-3" v-touch="{
      right: () => drawer = true,
    }">
			<slot/>
		</v-main>

		<v-footer
			class="flex-column justify-center text-subtitle-2 text-grey-lighten-1 lh-sm"
			style="flex: none; user-select: none; min-height: 20px;"
		>
		</v-footer>
	</v-app>
</template>

<script>
import { router } from "@inertiajs/vue3";
import {useToast} from "vue-toastification";

export default {
	props: {
		toastification: { type: Array },
	},
	data() {
		return {
			overlay: false,
			drawer: null,
			items: [
				{ text: 'Dashboard', url: route('dashboard.index'), icon: 'mdi-home' },
			],
			toast: useToast(),
		};
	},
	mounted() {


		router.on('start', (event) => {
			console.log(`Starting a visit to ${event.detail.visit.url}`)
			this.overlay = true
		})
		router.on('navigate', () => {
			this.$nextTick(function () {
				this.showToasts()
			})
		})
		router.on('finish', (event) => {
			console.log(`Finish a visit to ${event.detail.visit.url}`)
			this.overlay = false
			this.showToasts()
		})

	},
	methods: {
		showToasts() {
			if(this.toastification) {
				this.toastification.forEach(toastData => {
					console.log( toastData )
					switch (toastData.type) {
						case 1: this.toast(toastData.text); break;
						case 2: this.toast.success(toastData.text); break;
						case 3: this.toast.info(toastData.text); break;
						case 4: this.toast.warning(toastData.text); break;
						case 5: this.toast.error(toastData.text); break;
					}
				})
			}
		},
	},
}
</script>
