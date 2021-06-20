<template>

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">
        <div class="tg-formtheme tg-formdashboard">
          <fieldset>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
              <div class="tg-dashboardbox">
                <div class="tg-dashboardboxtitle">
                  <h2>Registrar Proveedor</h2>
                </div>
                <div class="tg-dashboardholder">
                  <div class="form-group">
                      <input type="text"  v-model="providers_name" class="form-control" placeholder="Nombre de Proveedor">
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="providers_id_number" class="form-control" placeholder="Documento de  Proveedor">
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="providers_address" class="form-control" placeholder="Dirección">
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="providers_encargado" class="form-control" placeholder="Encargado">
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="providers_mobile" class="form-control" placeholder="Movil">
                  </div>
                  <div class="form-group">
                    <select class="form-control" v-model="providers_is_active">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
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
		</section>
	</main>
	
</template>


<script>

export default {

  data:function(){
      return {
        
        providers_name:'',
        providers_id_number:'',
        providers_address:'',
        providers_encargado:'',
        providers_mobile:'',
        providers_is_active:'',           
        
      }
  },


  methods:{

        PostProvider(){

                let  data = new FormData()
                data.append("providers_name", this.providers_name)
                data.append("providers_id_number", this.providers_id_number)
                data.append("providers_address", this.providers_address)
                data.append("providers_encargado", this.providers_encargado)
                data.append("providers_mobile", this.providers_mobile)
                data.append("providers_is_active", this.providers_is_active)
                axios.post('/post_provider', data)
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Proveedor Registrado',
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
  
};
</script>