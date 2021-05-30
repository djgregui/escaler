<?php 
    require_once '../../config.php'; 
    require_once DBAPI; 
    require_once HEADER_ADMIN_TEMPLATE; 
?>
<script>
    function changeVideo(url) {
    if(url.length > 32) {
        if(url.substr(0,32) == "https://www.youtube.com/watch?v=") {
            $("#iframe-video").show(); $("#video").attr("src","https://www.youtube-nocookie.com/embed/" + url.substr(32));
        } else {
            $("#iframe-video").hide(); $("#video").attr("src","");
        }
    } else {
        $("#iframe-video").hide(); $("#video").attr("src","");
    }
}
    // https://www.youtube-nocookie.com/embed/
</script>
<div class="container">
    <h2>Novo Produto</h2>
    <hr />
    <form action="/adm/processa.php?tipo=add_produto" method="post">
        <div class="row">
            <div class="form-group col-12">
                <label for="name">Nome do Produto</label>
                <input type="text" class="form-control" name="customer[nome]">
            </div>
            <div class="form-group col-12">
                <label for="campo6">Link do Produto no Fornecedor <i class="fas fa-info-circle" title="Link Original"></i></label>
                <input type="text" class="form-control" name="customer[original_url]">
            </div>
            <div class="form-group col-12">
                <label for="campo2">Descrição</label>
                <textarea rows='5' class="form-control" name="customer[descricao]"></textarea>
            </div>
            <div class="form-group col-md-4 col-lg-4 col-6">
                <label for="campo3">Marca</label>
                <input type="text" class="form-control" name="customer[marca]">
            </div>
            
            <div class="form-group col-md-4 col-lg-4 col-6">
                <label for="campo1">Modelo</label>
                <input type="text" class="form-control" name="customer[modelo]">
            </div>
            <div class="form-group col-md-4 col-lg-4 col-12">
                <label for="campo1">Coleção</label>
                <select class="form-control" name="customer[id_colecao]">
                <option value="" selected="selected" disabled="disabled">Selecione</option>
                <?php foreach(get_colecoes() as $colecao) { ?>
                    <option value="<?=$colecao['id']?>"><?=$colecao['nome']?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group col-12">
                <label for="name">Vídeo</label>
                <input type="text" class="form-control" name="customer[video]" onkeyup="changeVideo(this.value)" onkeypress="changeVideo(this.value)" onkeydown="changeVideo(this.value)">
                <div id="iframe-video" style="display:none">
                    <br>
                    <iframe style="width: 100%;aspect-ratio: 16/9;height: calc(100%);" id="video" width="560" height="315" src="https://www.youtube-nocookie.com/embed/0YNTkIpbJNI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 mb-4 text-center">
                <div class="btn-group">
                    <button type="submit" class="btn btn-danger">Salvar</button>
                    <a href="../index.php" class="btn btn-light">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include(FOOTER_ADMIN_TEMPLATE); ?>