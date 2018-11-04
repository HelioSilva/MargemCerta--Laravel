<template>  
    <div>
		    	
    	<div class="row">
    	
          <div id="myAlert" class="alert alert-danger collapse">
          	<a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong>Error.</strong>{{resposta}}
		  </div>
		  <div id="myAlertPositivo" class="alert alert-success collapse">
          	<a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong>Confirmação.</strong>{{resposta}}
		  </div>

                <!-- Pesquisa por codigo barras -->
                <div class="col-sm-6" style="background-color: #F1F1F1">
                     <form class="form-group" id="form1" enctype="application/json" method="POST">
                     	  
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Raio(KM)</label>
                                <input class="form-control"  v-model="raio" type="number" width="50px" name="raio" min="1" max="15" value="5">    
                            </div>
                            <div class="col-sm-4">
                                <label>Latitude</label>
                                <input class="form-control" value="-9.6702459"  v-model="latitude" id="lat" type="text" name="latitude">
                            </div>
                            <div class="col-sm-4">
                                <label>Longitude</label>
                                <input class="form-control" value="-35.7536002" v-model="longitude" id="lon" type="text" name="longitude">    
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label  for="">Codigo de Barras</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">                                
                                <input  class="form-control"  v-model="barras" type="text"/>  
                            </div>
                            <div class="col-sm-4">
                                <button id="btnSubmit"  @click="login" class="btn btn-primary">>></button>
                            </div>      
                        </div>                                       
                    </form> 
                </div>
        </div> 
  
		<table class="table table-bordered table-striped table-hover">
	        <thead>
	            <tr>
	                <th>id</th>
	                <th>titulo</th>
	                <th>Ultima Venda</th>
	                <th>RazaoSocial</th>
	                <th>Fantasia</th>
	                <th>Cidade</th>
	            </tr>
	        </thead>
	        <tbody>	            
	        	<tr v-for="u in list">
	                <td>{{u.codNcm}}</td>
	                <td>{{u.dscProduto}}</td>
	                <td>{{u.valUltimaVenda}}</td>
	                <td>{{u.nomRazaoSocial}}</td>
	                <td>{{u.nomFantasia}}</td>
	                <td>{{u.nomMunicipio}}</td>
	            </tr>	           
	        </tbody>
	    </table>
   
    </div>
</template>

<script>

var config = {
	    headers: {
	    	'Content-Type':'application/json',
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    emulateJSON: true
	};
	export default {

	data(){
		return{
			resposta:"",
			list :  [],
			barras : "",
			latitude:"",
			longitude:"",
			raio:""
		}
	},
	created (){
		
	},
	props: ['barras,latitude'],
	methods: {
		login () {

	    	var postData = 
				{
			      barras:    this.barras ,
			      dias:      3 ,
			      latitude:  this.latitude ,
			      longitude: this.longitude ,
			      raio:      this.raio
		    	};

			this.$http.post("/api",postData,config)
				.then(response => {
					this.list  = response.body
					this.resposta = "Consulta efetuada com sucesso!"
					$('#myAlertPositivo').show('fade');	
					setTimeout(function(){
						$('#myAlertPositivo').hide('fade');
					},2000);
				}, response =>{
					this.resposta = response.statusText;
					$('#myAlert').show('fade');	
					setTimeout(function(){
						$('#myAlert').hide('fade');
					},2000);				
				});
		}

	}

    }

</script>