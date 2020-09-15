<template>
    <div class="apartments">

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "list.vue",
        methods: {
            httpGetData(
                url,
                config = {},
                successCallback = () => {},
                errorCallback = () => {}
            ){
                axios
                    .get(url, config)
                    .then(response => {
                        successCallback(response);
                    })
                    .catch(error => {
                        errorCallback(error);
                    });
            }
        },
        mounted() {
            this.httpGetData(
                '/list',
                {},
                (response) => {

                }
            );
        }
    }
</script>
