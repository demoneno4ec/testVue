<template>
    <svg class="icon"
         :class="getClass">
        <use :href="href"></use>
    </svg>
</template>

<script>
    export default {
        name: "vue-svg",
        props: {
            code: {
                type: String,
                required: true
            },
            size: {
                type: Number,
                required: false,
                default: 24,
            }
        },
        data() {
            return {};
        },
        methods: {},
        computed: {
            href() {
                return "/images/icons/sprite.svg#" + this.code;
            },
            getClass() {
                return 'icon_' + this.size;
            }
        },
    }
</script>