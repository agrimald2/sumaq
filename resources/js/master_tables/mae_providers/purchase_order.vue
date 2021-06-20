<template>

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">
            <div class="row">
                <ul class="nav nav-pills nav-wizard">
						<li style="width:50%;">
							<router-link to="/provider">
							Proveedores
							</router-link>
						</li>					
						<li  class="active" style="width: 50%;">
							<router-link to="/purchase_orders">
							Realizar Orden
							</router-link>		
						</li>
				</ul>
                <div class="tg-formtheme tg-formdashboard">
                <fieldset>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-12 tg-lgcolwidthhalf">
                    <div class="tg-dashboardbox"  style="margin-top: 40px;">
                        <div class="tg-dashboardboxtitle">
                        <h2>Registrar Orden</h2>
                        </div>
                        <div class="tg-dashboardholder">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" v-model="purchase_orders_solicited_by" placeholder="Compra solicita por...">
                                </div>
                                <div class="col-md-4">
                                    <label>Fecha de Solicitud: <b> {{fecha}} </b></label>
                                </div>
                                <div class="col-md-4">
                                    <autocomplete :search="search_proveedor"
                                                  placeholder="Nombre del Proveedor"
                                                  :get-result-value="getResultValueProveedor"
                                                  @submit="onSubmitProveedor"> 
                                    </autocomplete>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="date" class="form-control" v-model="preview_arrival_date" placeholder="Fecha de llegada de la orden">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" v-model="purchase_orders_confirmed_by" placeholder="Compra confirmada por...">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" v-model="purchase_orders_received_by" placeholder="Compra sera recibidad por....">
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea  v-model="purchase_orders_observation" placeholder="Observaciones de la compra" class="form-control"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> ¿Todo bien con su compra? </label>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="input-group">
                                                <label >Si </label>
                                                <input type="checkbox" value="1"  class="form-control" v-model="purchase_orders_is_ok"> 
                                            </div>   
                                          </div >
                                          <div class="col-md-6">       
                                            <div class="input-group">
                                                <label >No </label>
                                                <input type="checkbox" value="0"  class="form-control" v-model="purchase_orders_is_ok"> 
                                            </div>
                                          </div>
                                        </div>                                                                             
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea placeholder="Colocar su reclamo" class="form-control" v-model="purchase_orders_complain"></textarea>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <autocomplete :search="search_producto"
                                                    placeholder="Nombre del Producto"
                                                    :get-result-value="getResultValueProduct"
                                                    @submit="onSubmitProducto"> 
                                      </autocomplete>
                                  </div>  
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                              <td>Nombre del producto</td>
                                              <td>Cantidad</td>
                                              <td>Sub-Monto</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data, index) in data_order">
                                              <td>{{data.products_name}}</td>
                                              <td> <input type="text" class="form-control" v-model="data.total_products"> </td>
                                              <td>{{ parseFloat(data.products_price* data.total_products ).toFixed(2)}}</td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                              <td>Total</td>
                                              <td>{{ purchase_orders_total_price= parseFloat(Total).toFixed(2)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                               
                        </div>
                    </div>
                    </div>
                </fieldset>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <button class="btn btn-primary" type="button" @click="PostProvider">Registrar</button>
                        <router-link to="/provider">
                            <button class="btn btn-default" type="button">Cancelar</button>
                        </router-link>                
                    </div>
                </div> 
            </div>
		</section>
	</main>
	
</template>


<script>

import Autocomplete from '@trevoreyre/autocomplete-vue';
import '@trevoreyre/autocomplete-vue/dist/style.css'

export default {

    components: {
            Autocomplete
    },

  data:function(){
      return {
        products_id:'',
        providers_id:'',
        purchase_orders_solicited_by:'',
        purchase_orders_solicited_date:'',
        providers_id:'',
        preview_arrival_date:'',
        purchase_orders_confirmed_by:'',
        purchase_orders_confirmed_at:'',
        purchase_orders_received_by:'',
        purchase_orders_arrived_at:'',
        purchase_orders_observation:'',
        purchase_orders_is_ok:'',
        purchase_orders_complain:'',
        purchase_orders_total_price:'',
        total_products:'',
        hoy: new Date(),  
        fecha:'',
        data_order:[],
        neworder: null,
      }
  },
  computed:{
      Total:function(){
        var resultado=0.0;
        for(var i=0;i<this.data_order.length;i++){
          resultado= resultado+(this.data_order[i].products_price*this.data_order[i].total_products);
        }
        return resultado;
      }
  },

  methods:{

            /**Producto**/
          search_producto(input) {
			      const url = `/search_producto/${encodeURI(input)}`
			 
			      return new Promise((resolve) => {
			        if (input.length < 3) {
			          return resolve([])
			        }
			 
			        fetch(url)
			          .then((response) => response.json())
			          .then((data) => {
			            resolve(data)
			          })
			      })
			    },


		      getResultValueProduct(result) {
			      return result.products_name;
			    },

			    onSubmitProducto(result) {
			    	  this.products_id=result.products_id;
              this.neworder = result;
              if(!this.neworder) return;
              this.data_order.push(this.neworder);
              this.neworder = '';
              this.saveOrder();
			    },

          saveOrder() {
            let parsed = JSON.stringify(this.data_order);
            localStorage.setItem('data_order', parsed);
          },

            /**Proveedor**/
                search_proveedor(input) {
			      const url = `/search_proveedor/${encodeURI(input)}`
			 
			      return new Promise((resolve) => {
			        if (input.length < 3) {
			          return resolve([])
			        }
			 
			        fetch(url)
			          .then((response) => response.json())
			          .then((data) => {
			            resolve(data)
			          })
			      })
			    },


		        getResultValueProveedor(result) {
			      return result.providers_name;
			    },

			    onSubmitProveedor(result) {
			    	this.providers_id=result.providers_id;
              this.providers_id = result.providers_id;
			      	console.log(result.providers_name);
			    },


        PostProvider(){

                axios.post('/post_order', {
                  'purchase_orders_solicited_by': this.purchase_orders_solicited_by,
                  'purchase_orders_solicited_date': this.purchase_orders_solicited_date,
                  'providers_id': this.providers_id,
                  'preview_arrival_date': this.preview_arrival_date,
                  'purchase_orders_confirmed_by': this.purchase_orders_confirmed_by,
                  'purchase_orders_received_by': this.purchase_orders_received_by,
                  'purchase_orders_observation': this.purchase_orders_observation,
                  'purchase_orders_is_ok': this.purchase_orders_is_ok,
                  'purchase_orders_complain': this.purchase_orders_complain,
                  'purchase_orders_total_price': this.purchase_orders_total_price,
                  'data_order_details':this.data_order
                })
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Orden Registrada',
                              type: 'success',
                              confirmButtonText: 'OK'
                            });
                            this.$router.replace('/provider');
                        }else{
                            Swal.fire({
                              title: response.data.message,
                              text: 'Error al Registrar',
                              type: 'success',
                              confirmButtonText: 'OK'
                            })
                        };
                }).catch(function (error) {
                    console.log(error);
                });
        },

  },

    mounted() {
        let self = this
        var mes = self.hoy.getMonth()+1; //obteniendo mes
        var dia = self.hoy.getDate(); //obteniendo dia
        var ano = self.hoy.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes;
        
        self.fecha = ano+"-"+mes+"-"+dia;
        self.purchase_orders_solicited_date = self.fecha;


        if (localStorage.getItem('data_order')) {
                try {
                  this.data_order = JSON.parse(localStorage.getItem('data_order'));
                } catch(e) {
                  localStorage.removeItem('data_order');
                }
        };

    

        
    }
  
};
</script>

<style>

.autocomplete-result-list{
    position: relative !important;
    list-style: none !important;
}
	
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