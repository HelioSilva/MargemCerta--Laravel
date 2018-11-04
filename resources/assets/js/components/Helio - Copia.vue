<template>  
    <div>
    	<div class="row">
                <!-- Pesquisa por codigo barras -->
                <div class="col-sm-6" style="background-color: #F1F1F1">
                     <form class="form-group" id="form1" enctype="application/json" method="POST">
                     	
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Raio(KM)</label>
                                <input class="form-control"  type="number" width="50px" name="raio" min="1" max="15" value="5">    
                            </div>
                            <div class="col-sm-4">
                                <label>Latitude</label>
                                <input class="form-control" id="lat" type="text" name="latitude">
                            </div>
                            <div class="col-sm-4">
                                <label>Longetude</label>
                                <input class="form-control" id="lon" type="text" name="longetude">    
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label  for="">Codigo de Barras</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">                                
                                <input  class="form-control" type="text"/>  
                            </div>
                            <div class="col-sm-4">
                                <button type="subimit" @click="create" class="btn btn-primary">Pesquisar menor preço</button>
                            </div>      
                        </div>                                       
                    </form> 
                </div>

                <!-- Pesquisa por descricao -->
                <div class="col-sm-6">
                     <form class="form-group" enctype="multipart/form-data" method="POST">
                        
                        <div class="row">
                            <label  for="">Nome do Produto</label>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">                                
                                <input  class="form-control" type="text" name="infor"/>  
                            </div>
                            <div class="col-sm-4">
                                <button type="subimit" class="btn btn-primary">Pesquisar menor preço</button>
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
	    headers: {'Content-Type':'application/x-www-form-urlencoded'}
	};

	export default {
			mounted:function() {
	            console.log('Component mounted.')
	        },	    	
	    	data:function() {
	    		return {
	    			list: []
	    		}
	    	},
	    	methods(){

	    		create(){   			


	    			// var postData = [
	    			// 	{
					   //    email: "test@test.com",
					   //    password: "password"
				    // 	}
	    			// ] ;

	    			// axios.post('./api',{email:"teste"});
	    			// alert('teste');
	    			// Send a POST request
					axios({
					headers: { "content-type": "application/x-www-form-urlencoded"},
					method: 'post',
					url: '/api',				 
					charset: "utf-8",
	                responseType: 'blob',
					data: postData
					}).then((res) => {
						this.list = res.data;
					});


	    // 			// axios.post('/api',{barras = 'this.barras',latitude ='-02012010102'},config)
	    // 			//  .then((res) => {
	    // 			//  	this.list = res.data;
	    // 			//  });
	    			
	    // 		}
	    	}

	    }
	}
</script>

