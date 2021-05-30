<?php
require 'config.php';
require DBAPI;
require HEADER_SITE_TEMPLATE;
?>
<h2 class="text-center mt-4 mb-4 pt-4">Contato</h2>
<div class="container">
    <form action="<?=BASEURL?>usuario/processa.php?tipo=contato" method="post">
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Nome</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Nome Completo">
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Telefone</div>
            </div>
            <input type="tel" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Telefone">
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Email</div>
            </div>
            <input type="email" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email">
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Tipo de Contato</div>
            </div>
            <select class="custom-select">
                <option selected disabled>Selecione...</option>
                <option value="1">Ajuda</option>
                <option value="2">Opinião</option>
                <option value="3">Sugestão</option>
                <option value="3">Reclamação</option>
            </select>
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Mensagem</div>
            </div>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
        <p class="text-right">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </p>
    </form>
</div>