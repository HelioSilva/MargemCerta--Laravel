                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Codigo interno</label>
                    <input type="text" class="form-control" placeholder="Código">
                </div> -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Codigo de barras</label>
                    @isset($produto)
                    <input type="number" value="{{ $produto->barras }}" required class="form-control"  maxlength="14" placeholder="Digite o código de barras" name="barras">
                    @else
                    <input type="number" required class="form-control"  maxlength="14" placeholder="Digite o código de barras" name="barras">
                    @endisset
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nome do Produto</label>
                    @isset($produto)
                    <input type="text" value="{{$produto->nome}}" required class="form-control" style="text-transform:uppercase"  placeholder="Digite o nome do produto" name="nome">
                    @else
                    <input type="text" required class="form-control" style="text-transform:uppercase"  placeholder="Digite o nome do produto" name="nome">
                    @endisset
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Preço Custo</label>
                    @isset($produto)
                    <input type="number" value="{{$produto->custo}}" id="valores" required step=0.01 class="form-control valores" placeholder="Custo" name="custo">
                    @else
                    <input type="number" id="valores" required step=0.01 class="form-control valores" placeholder="Custo" name="custo">
                    @endisset
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Preço Venda</label>
                    @isset($produto)
                    <input type="number" value="{{$produto->preco}}" required step=0.01 class="form-control valores" placeholder="Venda" name="preco">
                    @else
                    <input type="number" required step=0.01 class="form-control valores" placeholder="Venda" name="preco">
                    @endisset
                </div>
                
                