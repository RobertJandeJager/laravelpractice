<template>
    <div>
        <div class="row">
            <div class="col-md-4" v-for="food in foods">
                <img  :src="'/images/' + food.image">
                <button @click="addToCart(food)">Add to cart</button>
            </div>
        </div>
    </div>
</template>

<script>
import { eventBus } from "../app.js"
export default {
    props: {
        image : {
            required : false
        }
    },

    data: function(){
        return {
            visible: true,
            firstImage: '/images/v_soup.png',
            secondImage: '/images/v_peanutdish.png',
            foods: [
                {
                    id: 1,
                    name: 'Burger',
                    image: 'v_burger.png',
                    cost: 1.25,
                    stock: 1,
                    amount: 1,
                },

                {
                    id: 2,
                    name: 'Peanut Dish',
                    image: 'v_peanutdish.png',
                    cost: 3.75,
                    stock: 2,
                    amount: 1,
                },

                {
                    id: 3,
                    name: 'rice stuff',
                    image: 'v_ricedish.png',
                    cost: 12.95,
                    stock: 3,
                    amount: 1,
                },

                {
                    id: 4,
                    name: 'some salad or something',
                    image: 'v_salad.png',
                    cost: 12.95,
                    stock: 3,
                    amount: 1,
                },

                {
                    id: 5,
                    name: 'Something with fruit',
                    image: 'v_slicedfruitdish.png',
                    cost: 12.95,
                    stock: 3,
                    amount: 1,
                },

                {
                    id: 6,
                    name: 'Soup, just Soup, its just soup',
                    image: 'v_soup.png',
                    cost: 12.95,
                    stock: 3,
                    amount: 1,
                },

            ],
    
        }


    },

    methods: {
        changeImage: function(){
            this.firstImage = this.secondImage;
            },

        addToCart: function(food){
            eventBus.$emit('add-to-cart', food);
        }
        
        
        
            
        

    }
}

</script>
