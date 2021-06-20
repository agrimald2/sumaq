<template>

	<main id="tg-main" class="tg-main tg-haslayout">
		<section class="tg-dbsectionspace tg-haslayout">

      <!--Inicio del modal agregar/actualizar-->
                <div  class="permiso" :class="{'mostrar' : permiso}" style="overflow-y: auto;padding-top: 50px;">
                    <div class="permiso-content" style="width: 552px !important; background: rgb(255, 255, 255) !important;">
                        <div class="modal-body">
                            <div class="row">
                              <form class="tg-formtheme tg-formdashboard">
                                <fieldset>
                                  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
                                    <div class="tg-dashboardbox">
                                      <div class="tg-dashboardboxtitle">
                                        <h2>Ingresar Producto</h2>
                                      </div>
                                      <div class="tg-dashboardholder">
                                        <div class="form-group">
                                          <input type="text"  v-model="no_produto" class="form-control" placeholder="Nombre de su Producto">
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control" v-model="id_subcategoria">
                                            <option v-for="data in categoriaproductos"  :value="data.id_subcategoria">
                                                {{data.no_subategoria}}
                                            </option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input type="number"  v-model="pt_producto" class="form-control" placeholder="Precio">
                                        </div>
                                        <div class="form-group">
                                          <input type="number"  v-model="qt_stock" class="form-control" placeholder="Stock del Producto">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">

                                    <vue2Dropzone ref="tx_ruta_imagen" id="dropzone"
                                                  v-on:vdropzone-max-files-exceeded="maxFilesAlert"
                                                  :options="dropzoneOptions">
                                    </vue2Dropzone>
                                    <br><br>
                                   <!-- <label style="color: red"><small>Suba imagenes con la medida 1080x1080*</small></label> -->
                                    
                                  </div>
                                </fieldset>
                              </form>                              
                            </div>
                        </div>            
                        <div class="modal-footer">
                            <button class="tg-btn" type="button" @click="RegistrarProductos"
                                      style="background: rgb(14 11 11 / 93%); color: #f3ecec;">Registrar</button>
                            <button class="tg-btn" type="button" @click="Cerrar"
                                      style="background: rgb(14 11 11 / 93%); color: #f3ecec;">Cerrar</button>
                        </div>
                  </div>
                </div>
      <!--Fin del modal-->
      

      <div class="row">
          <div class="tg-formtheme tg-formdashboard">
            <fieldset>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-dashboardbox">
                  <div class="tg-dashboardboxtitle">
                    <h2>Lista de Productos</h2>
                  </div>
                  <div class="tg-dashboardholder">
                    <div class="tg-otherfilters">
                      <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 pull-left">
                            <div  class="form-group tg-inputwithicon">
                                <button class="btn btn-primary" @click="Modal">
                                    Crear Producto
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 pull-right">
                          <div class="form-group tg-inputwithicon">
                            <i class="icon-magnifier"></i>
                            <input type="search" class="form-control" placeholder="Nombre del Producto" v-model="search_no_producto" v-on:keyup="searchProducto">
                          </div>
                        </div>
                      </div>
                    </div>
                    <table id="tg-adstype" class="table tg-dashboardtable tg-payments">
                      <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Categoria</th>
                          <th>Stock</th>
                          <th>Precio</th>
                          <th>Imagen</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr data-category="packageone" v-for="(data, index) in searchInUsers">
                          <td data-title="Producto">
                            <h3>{{data.no_produto}}</h3>
                          </td>
                          <td>
                            <h3>{{data.no_subategoria}}</h3>
                          </td>
                          <td data-title="Stock">{{data.qt_stock}}</td>
                          <td data-title="Precio"><h3>S/ {{data.pt_producto}}</h3></td>
                          <td data-title="Imagen">
                            <img :src="'/productos/'+data.tx_img1" style="width: 120px;">
                          </td>
                          <td data-title="Action">
                            <div class="tg-btnsactions">
                              <a class="tg-btnaction tg-btnactionview" href="javascript:void(0);"><i class="fa fa-eye"></i></a>
                              <a class="tg-btnaction tg-btnactiondelete" href="javascript:void(0);"><i class="fa fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="card-footer" style="background-color: rgb(0 0 0 / 0%) !important;border-top: 1px solid rgb(255 255 255 / 13%) !important;">
                        <nav aria-label="Page navigation" class="float-left">
                            <ul class="pagination">
                            <!--Botones anteriores-->
                                <li v-if="pagination.currentPage == 1" class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-fast-backward"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li v-else class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(1)">
                                        <span aria-hidden="true"><i class="fa fa-fast-backward"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>


                                <li v-if="pagination.currentPage == 1" class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-step-backward"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li v-else class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(pagination.currentPage - 1)">
                                        <span aria-hidden="true"><i class="fa fa-step-backward"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <!--Botones anteriores-->

                                <li v-for="(page,index) in getLinksPages" class="page-item" :class="[page === isCurrentPage ? 'active':'' ]">
                                    <span v-if="page === isCurrentPage" class="page-link">{{ page }}</span>
                                    <a v-else class="page-link" href="#" @click.prevent="changePage(page)" >{{page}}</a>
                                </li>

                            <!--Botones posteriores-->
                                <li v-if="pagination.currentPage == pagination.lastPage" class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-step-forward"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                <li v-else class="page-item">
                                    <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(pagination.currentPage + 1)">
                                        <span aria-hidden="true"><i class="fa fa-step-forward"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>

                                <li v-if="pagination.currentPage == pagination.lastPage" class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-fast-forward"></i></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                <li v-else class="page-item">
                                    <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(pagination.lastPage)">
                                        <span aria-hidden="true"><i class="fa fa-fast-forward"></i></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            <!--Botones posteriores-->  
                            </ul>
                        </nav>
                    </div>
                  </div>

                </div>
              </div>
            </fieldset>
          </div>
      </div>
		</section>
	</main>
	
</template>


<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
  name: "App",

  props:['user'],

  components: {
       vue2Dropzone
  },

  data:function(){
      return {
        items_prod:[],
        categoriaproductos:[],
        no_produto:'',
        pt_producto:'',
        qt_stock:'',  
        search_no_producto:'', 
        id_subcategoria:'',
        permiso:0,

        selectPerPage:10,
        search:'',
        pagination:{
          perPage:10,
          total:0,
          currentPage:1,
          from:0,
          to:0,
          lastPage:0,
          currentUsers:[],
          links:[]
        },
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
               this.$refs.tx_ruta_imagen.removeFile(file);
        },
        
        clearForm(){
          let me = this;
          me.no_produto = '';
          me.pt_producto = '';
          me.qt_stock = '';
          me.$refs.tx_ruta_imagen='';
        },

        Modal(){
          this.permiso=1;
        },

        Cerrar(){
          this.permiso=0;
        },

        RegistrarProductos(){
                this.$refs.tx_ruta_imagen.processQueue();
                let images  = this.$refs.tx_ruta_imagen.getAcceptedFiles();
                let index = 0;
                let files  = []
                let  data = new FormData()

                for( let i = 0; i < images.length; i++ ){
                    let file = images[i];
                    data.append('tx_ruta_imagen[' + i + ']', file);
                }

                data.append("id_subcategoria", this.id_subcategoria)
                data.append("no_produto", this.no_produto)
                data.append("pt_producto", this.pt_producto)
                data.append("qt_stock", this.qt_stock)
                axios.post('empresa/productos', data,{ headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Producto Registrado',
                              type: 'success',
                              confirmButtonText: 'OK'
                            })
                        }else{
                            Swal.fire({
                              title: response.data.message,
                              text: 'Medidas Incorrectas de las Imagenes',
                              type: 'success',
                              confirmButtonText: 'OK'
                            })
                        };
                    this.clearForm();
                    this.GetProductos();
                }).catch(function (error) {
                    console.log(error);
                });


        },

        //Paginacion vue//
        GetProductos(){
              let me=this;
              axios.get('lista_productos').then(function(response){
                me.items_prod = response.data;
          });
        },

        changePage(page){
            this.pagination.perPage=this.selectPerPage;
            this.pagination.currentPage = Number(page);
        },

        onKeySearch(){
            this.changePage(1);
        },
        //End Paginate//

        CategoriasProductos(){
              let me=this;
              axios.get('lista_subcategoria').then(function(response){
                me.categoriaproductos = response.data;
          });
        },

        searchProducto(){
          let me=this;
          axios.get('/buscar/producto?buscarproducto='+ me.search_no_producto).then(function(response){
              me.items_prod=response.data;
          })
        }

        

  },

  computed:{
      getCurrentUsers(){
          this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
          this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
          return this.libros.slice(this.pagination.from,this.pagination.to);
      },
      getLinksPages(){
        let cant = this.pagination.total / Number(this.pagination.perPage);
        this.pagination.links=[];
        let cumstom_links=[];
        /*obtiene los numeros de todas las paginas*/
        for ( let i=0 ; i <  cant; i++) {
            this.pagination.links.push(i+1);
        }
        this.pagination.lastPage = this.pagination.links.length;
        let start = 0;
        let limit = 5;
        if (this.pagination.currentPage < 3) {
            start = 0;
            return this.pagination.links.slice(start,limit);
        }else if (this.pagination.currentPage >= 3 && this.pagination.currentPage-1+2 < this.pagination.lastPage){
            start=(this.pagination.currentPage-1)-2;
            limit = start+limit;
            return this.pagination.links.slice(start,limit);
        }else{
            if (this.pagination.links.length == 4) {
                start=0;
                limit = start+limit;
                return this.pagination.links.slice(start,limit);    
            }else{
                start=(this.pagination.lastPage-1)-4;
                limit = start+limit;
                return this.pagination.links.slice(start,limit);
            }
        }
                
      },
      isCurrentPage(){
          return this.pagination.currentPage;
      },
      searchInUsers(){
        let me =this;

        /*me.libros.filter(function(libro){ 
          console.log(libro.libro_nombre.toLowerCase());
        });*/
          if (this.search.length > 0){
              this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
              this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
              this.pagination.total = me.items_prod.filter((prod) => prod.no_produto.toLowerCase().includes(this.search.toLowerCase())).length;
          }else{
              this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
              this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
              this.pagination.total = me.items_prod.length;
          }
          return me.items_prod.filter((prod) => prod.no_produto.toLowerCase().includes(this.search.toLowerCase())).slice(this.pagination.from,this.pagination.to);
      }
  },


   mounted() {
            let self = this
            setTimeout(function(){
              self.GetProductos();
              self.CategoriasProductos();
            },2000);

  }

  
};
</script>
<style>
  
    .permiso.mostrar {
        background-color: rgba(0,0,0,.5);
        opacity: 1;
        visibility: visible;
    }
    .permiso {
        align-items: flex-start;
        background-color: #fff;
        display: flex !important;
        height: 100vh;
        justify-content: center;
        left: 0;
        opacity: 0;
        position: fixed;
        top: 0;
        visibility: hidden;
        width: 100%;
        transition: all 0.40s cubic-bezier(0.39, 0.575, 0.565, 1);
        z-index: 5000;
      }

      .permiso.mostrar .permiso-content {
          opacity: 1;
          transform: scale(1.1);
          visibility: visible;
      }
      .permiso .permiso-content {
          background-color: #fff;
          border-radius: 3px;
          box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
          margin-top: 50px;
          opacity: 0;
          padding: 12px;
          transform: scale(1);
          transition: all .40s cubic-bezier(0.39, 0.575, 0.565, 1);
          visibility: hidden;
      }

</style>