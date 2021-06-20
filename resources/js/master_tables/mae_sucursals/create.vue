<template>

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">
        <div class="tg-formtheme tg-formdashboard">
          <fieldset>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
              <div class="tg-dashboardbox">
                <div class="tg-dashboardboxtitle">
                  <h2>Registrar Sucursal</h2>
                </div>
                <div class="tg-dashboardholder">
                  <div class="form-group">
                      <input type="text"  v-model="sucursals_name" class="form-control" placeholder="Nombre del Sucursal">
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="sucursals_address" class="form-control" placeholder="Dirección del Sucursal">
                  </div>
                  <div class="form-group">
                     <select class="form-control" v-model="sucursals_is_active">
                         <option value="1">Ativo</option>
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
                <button class="btn btn-primary" type="button" @click="PostSucusals">Registrar</button>
            </div>
        </div> 
		</section>
	</main>
	
</template>


<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {

  components: {
       vue2Dropzone
  },

  data:function(){
      return {
        sucursals_name:'',
        sucursals_address:'',
        sucursals_is_active:'',
      }
  },


  methods:{

        maxFilesAlert(file){
                Swal.fire({
                    title: 'No permitido',
                    text: 'Solo se permiten 1 archivos',
                    type: 'error',
                    confirmButtonText: 'OK'
                })
               this.$refs.collections_image_url.removeFile(file);
        },
        

        PostSucusals(){

                let  data = new FormData()
                data.append("sucursals_name", this.sucursals_name)
                data.append("sucursals_address", this.sucursals_address)
                data.append("sucursals_is_active", this.sucursals_is_active)
                axios.post('/post_sucursal', data,{ headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Sucursal Registrada',
                              type: 'success',
                              confirmButtonText: 'OK'
                            });
                            this.$router.replace('/sucursal');
                        }else{
                            Swal.fire({
                              title: response.data.message,
                              text: 'Medidas Incorrectas de las Imagenes',
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