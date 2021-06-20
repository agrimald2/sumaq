<template>
	

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">
	      <div class="row">
	      	<ul class="nav nav-pills nav-wizard">
			    <li class="active" style="width: 35%;"><a>Pedidos</a></li>
			    <li style="width: 35%;"><a>Compra</a></li>
			    <li style="width: 30%;"><a>Pago</a></li>
			</ul>
			<div class="row" style="padding-top: 2%;">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
	              <div class="tg-dashboardbox">
	                <div class="tg-dashboardholder">
	                  <div class="form-group">
	                      <input type="text"  class="form-control" placeholder="Nombre de la Categoria">
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
	              <div class="tg-dashboardbox">
	                <div class="tg-dashboardholder">
	                  <div class="form-group">
	                      	<qrcode-stream @decode="onDecode">
	                        </qrcode-stream>
	                  </div>
	                </div>
	              </div>
	            </div>
			</div>
	      </div>
	    </section>
	</main>



</template>

<script>

import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader';

export default {

	components: {
       QrcodeStream,
       QrcodeDropZone,
       QrcodeCapture
  	},

	data:function(){
	    return {



	    }
	},

	methods:{

		onDecode(decodedString){
  			//https://www.karpawasi.com/AlbatrozRestaurantePeruvianFast-food?#/
  			var url = decodedString;
  			console.log(url);
		},
	}

  
};
</script>

<style>
	
.nav-pills.nav-wizard > li {
  position: relative;
  overflow: visible;
  border-right: 15px solid transparent;
  border-left: 15px solid transparent;
}
.nav-pills.nav-wizard > li + li {
  margin-left: 0;
}
.nav-pills.nav-wizard > li:first-child {
  border-left: 0;
}
.nav-pills.nav-wizard > li:first-child a {
  border-radius: 5px 0 0 5px;
}
.nav-pills.nav-wizard > li:last-child {
  border-right: 0;
}
.nav-pills.nav-wizard > li:last-child a {
  border-radius: 0 5px 5px 0;
}
.nav-pills.nav-wizard > li a {
  border-radius: 0;
  background-color: #eee;
}
.nav-pills.nav-wizard > li:not(:last-child) a:after {
  position: absolute;
  content: "";
  top: 0px;
  right: -20px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 20px 0 20px 20px;
  border-color: transparent transparent transparent #eee;
  z-index: 150;
}
.nav-pills.nav-wizard > li:not(:first-child) a:before {
  position: absolute;
  content: "";
  top: 0px;
  left: -20px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 20px 0 20px 20px;
  border-color: #eee #eee #eee transparent;
  z-index: 150;
}
.nav-pills.nav-wizard > li:hover:not(:last-child) a:after {
  border-color: transparent transparent transparent #aaa;
}
.nav-pills.nav-wizard > li:hover:not(:first-child) a:before {
  border-color: #aaa #aaa #aaa transparent;
}
.nav-pills.nav-wizard > li:hover a {
  background-color: #aaa;
  color: #fff;
}
.nav-pills.nav-wizard > li.active:not(:last-child) a:after {
  border-color: transparent transparent transparent #428bca;
}
.nav-pills.nav-wizard > li.active:not(:first-child) a:before {
  border-color: #428bca #428bca #428bca transparent;
}
.nav-pills.nav-wizard > li.active a {
  background-color: #428bca;
}


</style>