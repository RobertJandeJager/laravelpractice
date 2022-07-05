
<template>
        <div >
            <span v-for="item in cart_item_data">
            <img :src="'/images/' + item.image" class="cart-product-img">
            <h5 class="cart-product-name">{{item.name}} (amount: {{item.amount}}) {{getTotal(item)}}</h5>
            </span>
        </div>
</template>

<script>
import { eventBus } from "../app.js"
export default {
    props: {
    },

    data: function(){
        return {
            visible: true,
            amount: 0,
            cart_item_data: [],

        }
        


    },

    created(){
        eventBus.$on("add-to-cart", (food) => {  
            this.addToCart(food);
            
        })
    },

    methods: {

        getTotal: function(){
            return(this.cart_item_data.cost * this.amount).toFixed(2);
        },
        
        addToCart: function(food) {
            let foundFood = false
            let self = this
            this.cart_item_data.forEach(function(e, index) {
                if (e.id == food.id){
                    foundFood = true
                    self.cart_item_data[index].amount++
                }
                else
                    return
            })
            if (foundFood == false){
                this.cart_item_data.push(food)    
            } 
 
         
        }


         /*            this.$on('add-to-cart', function (id) {
            // FIXME: subtract in *.html
            // id = id - 1;
            if (id in this.productsInCart) {
                // this.productsInCart[id]++
                Vue.set(this.productsInCart, id, this.productsInCart[id] + 1)
            } else {
                // this.productsInCart[id] = 1;
                Vue.set(this.productsInCart, id, 1)
            }
        }),
         */

        
    }
}
</script>

<!-- Vue.component('cart-item', {
   

    methods: {
        getTotal() {
            return (this.cart_item_data.cost * this.amount).toFixed(2);

        }
    },

 --> <!--            <div v-for="(count, productid) in productsInCart">
                <cart-item :cart_item_data="foods[productid-1]" :amount="count"></cart-item>
            </div> -->