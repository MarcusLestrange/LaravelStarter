import {defineStore} from 'pinia'
import {useToast} from "vue-toastification";

export const useAppStore = defineStore('appStore', {
    state: () => ({
        count: 0,
    }),
    getters: {
        doubleCount(state) {
            return state.count * 2
        },
    },
    actions: {
        getCurrentCount() {
            return 'Текущее значение: ' + this.count
        },
        increment() {
            this.count++
            useToast().info('increment: ' + this.count)
        },
        randomizeCounter() {
            this.count = Math.round(100 * Math.random())
            useToast().info('randomizeCounter: ' + this.count)
        },
    }
})
