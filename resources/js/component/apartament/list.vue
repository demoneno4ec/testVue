<template>
    <div class="apartments">
{{apartments}}
    </div>
</template>

<script>
    import axios from 'axios';
    import Entity from "json-entity";

    export default {
        name: "list.vue",
        data() {
            return {
                apartments: []
            }
        },
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
            },
            filterData(apartments) {
                let templateEntity = {
                        name: true,
                        address:{if: (user, options) => options.output === 'full'},
                        text: {if: (user, options) => options.output === 'full'},
                        liked: true,
                        image: true
                    },
                    optionEntity = {
                        output: 'full',
                        safe: false
                    };

                const ApartmentEntity = new Entity(templateEntity);

                return apartments.map((apartment) => {
                    return ApartmentEntity.represent(apartment, optionEntity);
                });
            }
        },
        mounted() {
            this.httpGetData(
                '/list',
                {},
                (response) => {
                    this.apartments = this.filterData(response.data);
                }
            );
        }
    }
</script>
