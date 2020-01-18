<template>

    <section>

        <div id="product-list">
            <div class="product-card">

                <div class="card-title">
                    <h1>Our Insurance Products</h1>
                </div>

                <div class="content">
                    <div v-for="product in products">
                        {{ product.name }}
                    </div>
                </div>
            </div>
        </div>

        <modal v-show="modalIsVisible" @close="modalIsVisible = false">

            <template v-slot:title>Product Title</template>

            <ul>
                <li> Product Info</li>
            </ul>

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
                'products': [
                    {name: 'Product 1'},
                    {name: 'Product 2'},
                ],
            }
        },
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
        width: 24rem;
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

    button {
        cursor: pointer;
        font-size: 1.2rem;
        color: hsl(171, 100%, 41%);
        border-radius: 4rem;
        display: block;
        width: 100%;
        background: transparent;
        border: 2px solid hsl(171, 100%, 41%);
        padding: 0.9rem 0 1.1rem;
        transition: color .5s, border-color .5s;
    }

</style>
