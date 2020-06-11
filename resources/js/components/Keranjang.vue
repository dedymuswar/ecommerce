<template>
  <div>
    <div class="mini_cart">
      <div class="cart_item" v-for="item in cartku" v-bind:key="item.id">
        <div class="cart_img">
          <a href="#" v-for="gambar in imagecart" v-bind:key="gambar.id">
            <img v-if="item.id == gambar.id" :src="'/storage/'+ gambar.image"/>
          </a>
        </div>
        <div class="cart_info">
          <a href="#">{{item.name}}</a>
          <p>
            Qty: {{ item.qty }} X
            <span>{{ item.price }}</span>
          </p>
        </div>
        <div class="cart_remove">
          <!-- <a href="#">
            <i class="ion-android-close"></i>
          </a> -->
        </div>
      </div>
      <div class="mini_cart_table">
        <div class="cart_total">
          <span>Sub total:</span>
          <span class="price">Rp{{subtotal}}</span>
        </div>
        <div class="cart_total mt-10">
          <span>total:</span>
          <span class="price">Rp{{total}}</span>
        </div>
      </div>

      <div class="mini_cart_footer">
        <div class="cart_button">
          <a href="/cart">View cart</a>
        </div>
        <div class="cart_button">
          <a href="/checkout">Checkout</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Keranjang",
  props: ['cartku','imagecart','subtotal', 'total'],
  data(){
      return{
          dataKeranjang:{}
      }
  },
  created(){
      this.dataKeranjang = this.cartku
    //   console.log(this.imagecart);
      
  }
}
</script>

<style>
</style>