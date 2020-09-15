<template>
    <div class="apartments">
        <apartment v-for="(apartment, index) in apartments"
                   class="apartments__apartment"
                   :key="index"
                   :name="apartment.name"
                   :address="apartment.address"
                   :image="apartment.image"
                   :description="apartment.text"
                   :liked="apartment.liked"
        ></apartment>
        <div class="apartments__apartment apartments__apartment_empty"></div>
        <div class="apartments__apartment apartments__apartment_empty"></div>
        <div class="apartments__apartment apartments__apartment_empty"></div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Entity from 'json-entity';
    import apartment from './item';

    export default {
        name: "list.vue",
        components: {
            apartment
        },
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
                        address: {if: (user, options) => options.output === 'full'},
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

<style lang="scss">
    .apartments {
        margin: -16px -24px;
        display: flex;
        flex-wrap: wrap;

        &__apartment {
            flex: 1 1 320px;
            margin: 0 24px;

            &:not(&_empty) {
                margin: 16px 24px;
            }
        }
    }
</style>
