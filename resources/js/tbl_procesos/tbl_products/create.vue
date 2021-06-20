<template>

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">
        <div class="tg-formtheme tg-formdashboard">
          <fieldset>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
              <div class="tg-dashboardbox">
                <div class="tg-dashboardboxtitle">
                  <h2>Registrar Productos</h2>
                </div>
                <div class="tg-dashboardholder">
                  <div class="form-group">
                      <input type="text"  v-model="products_name" class="form-control" placeholder="Nombre del Producto">
                  </div>
                  <div class="form-group">
                      <textarea  v-model="products_caracts" class="form-control" placeholder="Caracteristicas del Producto"></textarea>
                  </div>
                  <div class="form-group">
                     <select class="form-control" v-model="category_id">
                         <option v-for="datacategory in data_category" :key="datacategory.categories_id" :value="datacategory.categories_id">{{datacategory.categories_name}}}</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control" v-model="collection_id">
                         <option v-for="datacollections in data_collection" :key="datacollections.collections_id" :value="datacollections.collections_id">{{datacollections.collections_name}}</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control" v-model="discounts_id">
                         <option v-for="datadiscount in data_discounts" :key="datadiscount.discounts_id" :value="datadiscount.discounts_id">{{datadiscount.discounts_porcentaje}}%</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control" v-model="material_id">
                         <option v-for="data in data_material" :key="data.materials_id" :value="data.materials_id">{{data.materials_name}}</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control" v-model="products_is_active">
                         <option value="1">Ativo</option>
                         <option value="0">Inactivo</option>
                     </select>
                  </div>
                  <div class="form-group">
                      <input v-model="products_size" class="form-control" placeholder="Tamaño del Producto"/>
                  </div>
                  <div class="form-group">
                      <input v-model="products_price" class="form-control" placeholder="Precio del Producto"/>
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="products_net_price" class="form-control" placeholder="Nuevo precio del Producto">
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="container-fluid">
            <div class="row">
                <button class="btn btn-primary" type="button" @click="PostProducts">Registrar</button>
            </div>
        </div> 
		</section>
	</main>
	
</template>


<script>

export default {

  data:function(){
      return {
        data_category:[],
        data_collection:[],
        data_discounts:[],
        data_material:[],
        
        products_name:'',
        collection_id:'',
        category_id:'',
        material_id:'',
        products_caracts:'',
        products_size:'',
        products_price:'',
        products_net_price:'',
        discounts_id:'',
        products_is_active:'',

      }
  },


  methods:{

        GetCategories(){
              let me=this;
              axios.get('/get_categories').then(function(response){
                me.data_category = response.data;
          });
        },

        GetCollections(){
              let me=this;
              axios.get('/get_collection').then(function(response){
                me.data_collection = response.data;
          });
        },

        GetDiscount(){
              let me=this;
              axios.get('/get_discount').then(function(response){
                me.data_discounts = response.data;
          });
        },

        GetMaterials(){
              let me=this;
              axios.get('/get_material').then(function(response){
                me.data_material = response.data;
          });
        },

        PostProducts(){

                let  data = new FormData()
                data.append("products_name", this.providers_name)
                data.append("collections_id", this.collection_id)
                data.append("category_id", this.category_id)
                data.append("materials_id", this.material_id)
                data.append("products_caracts", this.products_caracts)
                data.append("products_size", this.products_size)
                data.append("products_price", this.products_price)
                data.append("products_net_price", this.products_net_price)
                data.append("discounts_id", this.discounts_id)
                data.append("products_is_active", this.products_is_active)
                axios.post('/post_products', data,{ headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Producto Registrada',
                              type: 'success',
                              confirmButtonText: 'OK'
                            });
                            this.$router.replace('/products');
                        }else{
                            Swal.fire({
                              title: response.data.message,
                              text: 'Error al registrar Producto',
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
            setTimeout(function(){
                self.GetCategories();
                self.GetCollections();
                self.GetDiscount();
                self.GetMaterials();
            },2000);

  }
  
};
</script>