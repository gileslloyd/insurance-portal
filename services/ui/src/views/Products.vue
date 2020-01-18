<template>

    <section>

        <div id="product-list">
            <div class="product-card">

                <div class="card-title">
                    <h1>Our Insurance Products</h1>
                </div>

                <div class="content">

                    <h1 class="loading subtitle is-5" v-show="loading">Fetching Products....</h1>

                    <section class="product-list">

                        <template v-for="product in products">
                            <div class="product-item">{{ product.name }}</div>
                            <div class="product-item"><a href="" @click.prevent="showDetails(product.id)">More Info</a></div>
                        </template>

                    </section>
                </div>
            </div>
        </div>

        <modal v-show="modalIsVisible" @close="modalIsVisible = false">

            <template v-slot:title>{{ selectedProduct.name }}</template>

            <p>{{ selectedProduct.description }}</p>

            <table class="table">
                <tr>
                    <td>Type</td>
                    <td>{{ selectedProduct.type }}</td>
                </tr>
                <tr>
                    <td>Suppliers</td>
                    <td>
                        <ul>
                            <li v-for="supplier in selectedProduct.suppliers">{{ supplier }}</li>
                        </ul>
                    </td>
                </tr>
            </table>

        </modal>

    </section>

</template>

<script>
    import ApiClient from '../classes/apiclient.js';
    import modal from './../components/Modal.vue';

    export default {

        name: 'Products',

        components: { modal },

        data() {
            return {
                'products': [],
                'modalIsVisible': false,
                'loading': true,
                'selectedProduct': {}
            }
        },

        mounted () {
            let self = this;

            ApiClient.get(
                'products',
                function (response) {
                    self.products = response.data.body;
                    self.loading = false;
                }
            );
        },

        methods: {
            showDetails(productId) {
                let self = this;

                ApiClient.get(
                    'product/'+productId,
                    function (response) {
                        self.selectedProduct = response.data.body;
                        self.modalIsVisible = true;
                    }
                );
            }
        }
    };

</script>

<style scoped>

    #product-list {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F7F7F7;
        overflow: hidden;
        padding: 2em;
    }

    .product-card {
        background: #fff;
        width: 35rem;
        box-shadow: 0 0 7px 0 rgba(0, 0, 0, 0.11);
    }

    .card-title {
        background-color: #00b89c;
        padding: 2rem;
    }

    h1 {
        color: #fff;
        text-align: center;
        font-size: 1.2rem;
    }

    .content {
        padding: 2rem 2.5rem 5rem;
    }

    span {
        margin-left: 0.5rem;
    }

    a {
        font-size: 0.8rem;
    }

    .product-list {
        display: grid;
        width: 100%;
        grid-template-columns: 66.667% 33.334%;
        row-gap: 1rem;
    }

    .product-item {
    }

    .table {
        width: 100%;
    }

</style>
