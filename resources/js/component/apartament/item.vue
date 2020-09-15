<template>
    <div class="apartment">
        <div class="apartment__image-box">
            <img class="apartment__image"
                 :src="image"
                 :alt="name"
                 :title="name"
            />
        </div>
        <div class="apartment__content">
            <div class="apartment__name">
                {{name}}
            </div>
            <div class="apartment__address">
                {{address}}
            </div>
            <div class="apartment__description">
                {{description}}
            </div>
        </div>
        <button class="apartment__liked"
                :class="{apartment__liked_disable: checked}"
                :disabled="checked"
                @click="changeLiked"
        >
            <vue-svg code="love"
                     class="apartment__icon"
            ></vue-svg>
        </button>
    </div>
</template>

<script>
    export default {
        name: "item",
        props: {
            name: {
                type: String,
                required: true
            },
            address: {
                type: String,
                required: true
            },
            image: {
                type: String,
                required: true
            },
            description: {
                type: String,
                required: true
            },
            liked: {
                type: Boolean,
                default: false
            },
        },
        data(){
            return {
                checked: this.liked
            }
        },
        methods: {
            changeLiked() {
                this.checked = !this.checked;
            }
        }
    }
</script>
