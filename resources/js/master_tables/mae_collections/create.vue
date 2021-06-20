<template>

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">
        <div class="tg-formtheme tg-formdashboard">
          <fieldset>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
              <div class="tg-dashboardbox">
                <div class="tg-dashboardboxtitle">
                  <h2>Registrar Colección</h2>
                </div>
                <div class="tg-dashboardholder">
                  <div class="form-group">
                      <input type="text"  v-model="collections_name" class="form-control" placeholder="Nombre de la Coleccion">
                  </div>
                  <div class="form-group">
                        <vue2Dropzone ref="collections_image_url" id="dropzone"
                            v-on:vdropzone-max-files-exceeded="maxFilesAlert"
                            :options="dropzoneOptions">
                        </vue2Dropzone>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="container-fluid">
            <div class="row">
                <button class="btn btn-primary" type="button" @click="PostCategory" >Registrar</button>
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
        collections_name:'',
        collections_image_url:'',
        dropzoneOptions: {
                    url: 'empresa/producto',
                    thumbnailWidth: 150,
                    maxFilesize: 1.5,
                    addRemoveLinks : true,
                    autoProcessQueue:false,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles:1,
                    uploadMultiple: true,
        },


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
        

        PostCategory(){
                this.$refs.collections_image_url.processQueue();
                let images  = this.$refs.collections_image_url.getAcceptedFiles();
                let index = 0;
                let files  = []
                let  data = new FormData()

                for( let i = 0; i < images.length; i++ ){
                    let file = images[i];
                    data.append('collections_image_url[' + i + ']', file);
                }

                data.append("collections_name", this.collections_name)
                axios.post('/post_collection', data,{ headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Colección Registrada',
                              type: 'success',
                              confirmButtonText: 'OK'
                            });
                            this.$router.replace('/collection');
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