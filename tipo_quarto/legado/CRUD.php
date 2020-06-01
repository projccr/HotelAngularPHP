<!DOCTYPE html>
<html lang="ptbr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Cadastro de Clientes</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- INICIO MASCARA CADASTRO-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
      <!-- FIM MASCARA CADASTRO-->
      <!-- INICIO SCRIPT BUSCA DADOS CEP NOVO CADASTRO-->  
      <script type="text/javascript" >
         function limpa_formulário_cep() {
                 //Limpa valores do formulário de cep.
                 document.getElementById('rua').value=("");
                 document.getElementById('bairro').value=("");
                 document.getElementById('cidade').value=("");
                 document.getElementById('uf').value=("");
                 //document.getElementById('ibge').value=("");
         }
         function meu_callback(conteudo) {
             if (!("erro" in conteudo)) {
                 //Atualiza os campos com os valores.
                 document.getElementById('rua').value=(conteudo.logradouro);
                 document.getElementById('bairro').value=(conteudo.bairro);
                 document.getElementById('cidade').value=(conteudo.localidade);
                 document.getElementById('uf').value=(conteudo.uf);
                 //document.getElementById('ibge').value=(conteudo.ibge);
             } //end if.
             else {
                 //CEP não Encontrado.
                 limpa_formulário_cep();
                 alert("CEP não encontrado.");
             }
         }    
         function pesquisacep(valor) {
         
             //Nova variável "cep" somente com dígitos.
             var cep = valor.replace(/\D/g, '');
             //Verifica se campo cep possui valor informado.
             if (cep != "") {
                 //Expressão regular para validar o CEP.
                 var validacep = /^[0-9]{8}$/;
                 //Valida o formato do CEP.
                 if(validacep.test(cep)) {
                     //Preenche os campos com "..." enquanto consulta webservice.
             document.getElementById('rua').value="...";
             document.getElementById('bairro').value="...";
             document.getElementById('cidade').value="...";
             document.getElementById('uf').value="...";
             //document.getElementById('ibge').value="...";
                     //Cria um elemento javascript.
                     var script = document.createElement('script');
                     //Sincroniza com o callback.
                     script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                     //Insere script no documento e carrega o conteúdo.
                     document.body.appendChild(script);
                 } //end if.
                 else {
                     //cep é inválido.
                     limpa_formulário_cep();
                     alert("Formato de CEP inválido.");
                 }
             } //end if.
             else {
                 //cep sem valor, limpa formulário.
                 limpa_formulário_cep();
             }
         };
      </script>
      <!-- FIM SCRIPT BUSCA DADOS CEP CADASTRO-->  
      <!-- INICIO SCRIPT BUSCA DADOS CEP EDITAR CADASTRO-->  
      <script type="text/javascript" >
         function meu_callbackedit(conteudo_edit) {
             if (!("erro" in conteudo_edit)) {
                 //Atualiza os campos com os valores.
                 console.log(campo_id)
                 console.log(conteudo_edit);
                 document.getElementById('edit_rua' + campo_id).value=(conteudo_edit.logradouro); //Elemento identificado por nome + id
                 document.getElementById('edit_bairro' + campo_id).value=(conteudo_edit.bairro);
                 document.getElementById('edit_cidade' + campo_id).value=(conteudo_edit.localidade);
                 document.getElementById('edit_uf' + campo_id).value=(conteudo_edit.uf);
         
                 //Aplica a máscara após preenchimento dos campos
                 
                  $('#edita_cep' + campo_id).mask("00000-000");
             } //end if.
             else {
                 //CEP não Encontrado.
                 alert("CEP não encontrado.");
             }
         }    
         function pesquisacepedit(valor,id) {
         
             console.log("Recebi o id " + id);
             //Retira "edita_cep" e deixa o id do cliente.
             campo_id = id.replace("edita_cep","");
         
             console.log("Agora meu valor é " + campo_id)
             //Nova variável "cep" somente com dígitos.
             var cep = valor.replace(/\D/g, '');
             //Verifica se campo cep possui valor informado.
             if (cep != "") {
                 //Expressão regular para validar o CEP.
                 var validacep = /^[0-9]{8}$/;
                 //Valida o formato do CEP.
                 if(validacep.test(cep)) {
                     //Preenche os campos com "..." enquanto consulta webservice.
             document.getElementById('edit_rua' + campo_id).value="..."; //Elemento identificado pelo nome + id
             document.getElementById('edit_bairro' + campo_id).value="..."; //Elemento identificado pelo nome + id
             document.getElementById('edit_cidade' + campo_id).value="..."; //Elemento identificado pelo nome + id
             document.getElementById('edit_uf' + campo_id).value="..."; //Elemento identificado pelo nome + id
         
           
         
                     //Cria um elemento javascript.
                     var script = document.createElement('script');
                     //Sincroniza com o callback.
                     script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callbackedit';
                     console.log("Chamei meucallbackedit");
                     //Insere script no documento e carrega o conteúdo.
                     document.body.appendChild(script);
                 } //end if.
                 else {
                     //cep é inválido.
                     alert("Formato de CEP inválido.");
                 }
             } //end if.
         };
      </script>
      <!-- FIM SCRIPT BUSCA DADOS CEP EDITAR CADASTRO-->  
      <style type="text/css">
         body {
         color: #566787;
         background: #f5f5f5;
         font-family: 'Varela Round', sans-serif;
         font-size: 13px;
         }
         .table-wrapper {
         background: #fff;
         padding: 20px 25px;
         margin: 30px 0;
         border-radius: 3px;
         box-shadow: 0 1px 1px rgba(0,0,0,.05);
         }
         .table-title {        
         padding-bottom: 15px;
         background: #435d7d;
         color: #fff;
         padding: 16px 30px;
         margin: -20px -25px 10px;
         border-radius: 3px 3px 0 0;
         }
         .table-title h2 {
         margin: 5px 0 0;
         font-size: 24px;
         }
         .table-title .btn-group {
         float: right;
         }
         .table-title .btn {
         color: #fff;
         float: right;
         font-size: 13px;
         border: none;
         min-width: 50px;
         border-radius: 2px;
         border: none;
         outline: none !important;
         margin-left: 10px;
         }
         .table-title .btn i {
         float: left;
         font-size: 21px;
         margin-right: 5px;
         }
         .table-title .btn span {
         float: left;
         margin-top: 2px;
         }
         table.table tr th, table.table tr td {
         border-color: #e9e9e9;
         padding: 12px 10px;
         vertical-align: middle;
         }
         table.table tr th:first-child {
         width: 60px;
         }
         table.table tr th:last-child {
         width: 100px;
         }
         table.table-striped tbody tr:nth-of-type(odd) {
         background-color: #fcfcfc;
         }
         table.table-striped.table-hover tbody tr:hover {
         background: #f5f5f5;
         }
         table.table th i {
         font-size: 13px;
         margin: 0 5px;
         cursor: pointer;
         }    
         table.table td:last-child i {
         opacity: 0.9;
         font-size: 22px;
         margin: 0 5px;
         }
         table.table td a {
         font-weight: bold;
         color: #566787;
         display: inline-block;
         text-decoration: none;
         outline: none !important;
         }
         table.table td a:hover {
         color: #2196F3;
         }
         table.table td a.edit {
         color: #FFC107;
         }
         table.table td a.delete {
         color: #F44336;
         }
         table.table td i {
         font-size: 19px;
         }
         table.table .avatar {
         border-radius: 50%;
         vertical-align: middle;
         margin-right: 10px;
         }
         .pagination {
         float: right;
         margin: 0 0 5px;
         }
         .pagination li a {
         border: none;
         font-size: 13px;
         min-width: 30px;
         min-height: 30px;
         color: #999;
         margin: 0 2px;
         line-height: 30px;
         border-radius: 2px !important;
         text-align: center;
         padding: 0 6px;
         }
         .pagination li a:hover {
         color: #666;
         }    
         .pagination li.active a, .pagination li.active a.page-link {
         background: #03A9F4;
         }
         .pagination li.active a:hover {        
         background: #0397d6;
         }
         .pagination li.disabled i {
         color: #ccc;
         }
         .pagination li i {
         font-size: 16px;
         padding-top: 6px
         }
         .hint-text {
         float: left;
         margin-top: 10px;
         font-size: 13px;
         }    
         /* Custom checkbox */
         .custom-checkbox {
         position: relative;
         }
         .custom-checkbox input[type="checkbox"] {    
         opacity: 0;
         position: absolute;
         margin: 5px 0 0 3px;
         z-index: 9;
         }
         .custom-checkbox label:before{
         width: 18px;
         height: 18px;
         }
         .custom-checkbox label:before {
         content: '';
         margin-right: 10px;
         display: inline-block;
         vertical-align: text-top;
         background: white;
         border: 1px solid #bbb;
         border-radius: 2px;
         box-sizing: border-box;
         z-index: 2;
         }
         .custom-checkbox input[type="checkbox"]:checked + label:after {
         content: '';
         position: absolute;
         left: 6px;
         top: 3px;
         width: 6px;
         height: 11px;
         border: solid #000;
         border-width: 0 3px 3px 0;
         transform: inherit;
         z-index: 3;
         transform: rotateZ(45deg);
         }
         .custom-checkbox input[type="checkbox"]:checked + label:before {
         border-color: #03A9F4;
         background: #03A9F4;
         }
         .custom-checkbox input[type="checkbox"]:checked + label:after {
         border-color: #fff;
         }
         .custom-checkbox input[type="checkbox"]:disabled + label:before {
         color: #b8b8b8;
         cursor: auto;
         box-shadow: none;
         background: #ddd;
         }
         /* Modal styles */
         .modal .modal-dialog {
         max-width: 400px;
         }
         .modal .modal-header, .modal .modal-body, .modal .modal-footer {
         padding: 20px 30px;
         }
         .modal .modal-content {
         border-radius: 3px;
         }
         .modal .modal-footer {
         background: #ecf0f1;
         border-radius: 0 0 3px 3px;
         }
         .modal .modal-title {
         display: inline-block;
         }
         .modal .form-control {
         border-radius: 2px;
         box-shadow: none;
         border-color: #dddddd;
         }
         .modal textarea.form-control {
         resize: vertical;
         }
         .modal .btn {
         border-radius: 2px;
         min-width: 100px;
         }    
         .modal form label {
         font-weight: normal;
         }    
      </style>
   </head>
   <body>
      <?php       
       
       
         include_once('banco/valida_acesso_banco_2.php');
         
         //Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
         $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
         
         //Selecionar todos os itens da tabela 
         $result_cliente = "SELECT * FROM cliente";
       
         $result_cliente = mysqli_query($con, $result_cliente);
         
         //Contar o total de itens
         $total_msg_contatos = mysqli_num_rows($result_cliente);
         
         //Seta a quantidade de itens por página
         $quantidade_pg = 10000;
         
         //calcular o número de páginas 
         $num_pagina = ceil($total_msg_contatos / $quantidade_pg);
         
         //calcular o inicio da visualizao    
         $inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
         
         //Selecionar  os itens da página
         $result_msg_contatos = "SELECT id_cliente, id_situacao, nome_completo, data_nascimento, cpf, rg, telefone_residencial, telefone_celular, cep, rua, bairro, cidade, estado, numero, complemento, observacoes, email, senha,  date_format(data_inclusao,'%d/%m/%y - %h:%i:%s') as data_inclusao_formatada, DATE_FORMAT(data_alteracao,'%d/%m/%y - %h:%i:%s') as data_alteracao_formatada FROM cliente limit $inicio, $quantidade_pg";
         $resultado_clientes  = mysqli_query($con, $result_msg_contatos);
         $total_msg_contatos  = mysqli_num_rows($resultado_clientes);
         
         ?>
      <div class="container-fixed-top">
         <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                  <div class="col-sm-6">
                     <h2><b>Dados de Cliente</b></h2>
                  </div>
                  <div class="col-sm-6">
                     <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Novo Cadastro</span></a>
                     <a href="gerar_planilha_excel.php"><button type='button' class='btn btn-sm btn-danger'>Exportar Dados Excel</button></a>
                     <a href="gerar_csv.php"><button type='button' class='btn btn-sm btn-danger'>Exportar Dados CSV</button></a>
                     <a href="index.php"><button type='button' class='btn btn-sm btn-warning'>Página Inicial</button></a> <br> <br> <br>
                  </div>
               </div>
            </div>
            <table class="table table-striped table-hover">
               <thead>
                  <tr>
                     <th class="text-center">Código Cliente</th>
                     <th class="text-center">Situação Cadastral</th>
                     <th class="text-center">Nome Completo</th>
                     <th class="text-center">Data de Nascimento</th>
                     <th class="text-center">CPF</th>
                     <th class="text-center">Telefone Residencial</th>
                     <th class="text-center">Telefone Celular</th>
                     <th class="text-center">E-mail</th>
                     <th class="text-center">Data de Inclusão</th>
                     <th class="text-center">Data alteração</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     while ($row_msg_contatos = mysqli_fetch_assoc($resultado_clientes)) {
                     ?>
                   
                  <tr>
                     <td class="text-center"><?php echo $row_msg_contatos["id_cliente"];?>              </td>
                     <td class="text-center"><?php echo $row_msg_contatos["id_situacao"];?>              </td>
                     <td class="text-center"><?php echo $row_msg_contatos["nome_completo"]; ?>         </td>
                     <td class="text-center"><?php echo $row_msg_contatos["data_nascimento"];?>          </td>
                     <td class="text-center"><?php echo $row_msg_contatos["cpf"]; ?>                   </td>
                     <td class="text-center"><?php echo $row_msg_contatos["telefone_residencial"];?>    </td>
                     <td class="text-center"><?php echo $row_msg_contatos["telefone_celular"];?>        </td>
                     <td class="text-center"><?php echo $row_msg_contatos["email"];?>                   </td>
                     <td class="text-center"><?php echo $row_msg_contatos["data_inclusao_formatada"];?>  </td>
                     <td class="text-center"><?php echo $row_msg_contatos["data_alteracao_formatada"];?></td>
                     <td>
                        <a href="#view<?php
                           echo $row_msg_contatos["id_cliente"];
                           ?>" class="view" title="Visualizar" data-toggle="modal" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <!-- Modo Visualizar HTML -->    
                                <div id="view<?php
                                echo $row_msg_contatos["id_cliente"];
                                ?>" class="modal fade">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <form id="Visualiza_Cadastro_cliente">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Visualizar Cadastro</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                       <input type="hidden" name="id_cliente" value="<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>">
                                       <div class="form-group">
                                          <label>Nome Completo</label>
                                          <input type="text" maxlength="80" class="form-control" autocomplete="off" id="nome_completo" name="nome_completo" value="<?php
                                             echo $row_msg_contatos["nome_completo"];
                                             ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Data de Nascimento</label>
                                          <input type="text" class="form-control" autocomplete="off" id="data_nascimento" name="data_nascimento" value="<?php
                                             echo $row_msg_contatos["data_nascimento"];
                                             ?>" required Readonly>
                                          <script type="text/javascript">
                                             $("#data_nascimento").mask("00/00/0000");
                                          </script>
                                       </div>
                                       <div class="form-group">
                                          <label>CPF</label>
                                          <input type="text" class="form-control" autocomplete="off" id="cpf" name="cpf" value="<?php
                                             echo $row_msg_contatos["cpf"];
                                             ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>RG</label>
                                          <input type="text" class="form-control" autocomplete="off" id="rg" name="rg" value="<?php
                                             echo $row_msg_contatos["rg"];
                                             ?>" required Readonly>
                                          <script type="text/javascript">
                                             $("#rg").mask("0000000000");
                                          </script>
                                       </div>
                                       <div class="form-group">
                                          <label>Telefone Residencial</label>
                                          <input type="text" class="form-control" autocomplete="off" id="tel_residencial" name="tel_residencial" value="<?php
                                             echo $row_msg_contatos["telefone_residencial"];
                                             ?>" required Readonly>
                                          <script type="text/javascript">
                                             $("#tel_residencial").mask("(00)0000-0000");
                                          </script>
                                       </div>
                                       <div class="form-group">
                                          <label>Telefone Celular</label>
                                          <input type="text" class="form-control" autocomplete="off" id="tel_celular" name="tel_celular" value="<?php
                                             echo $row_msg_contatos["telefone_celular"];
                                             ?>" required Readonly>
                                          <script type="text/javascript">
                                             $("#tel_celular").mask("(00)00000-0000");
                                          </script>
                                       </div>
                                       <div class="form-group">
                                          <label>
                                             CEP:
                                             <input name="cep" class="form-control" Readonly autocomplete="off" type="text" id="cep" value="<?php
                                                echo $row_msg_contatos["cep"];
                                                ?>" size="10" maxlength="9"/>
                                       </div>
                                       <div class="form-group">
                                       <label>Rua</label>
                                       <input type="text" class="form-control" autocomplete="off" id="rua" name="rua" size="60" value="<?php
                                          echo $row_msg_contatos["rua"];
                                          ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Bairro</label>
                                          <input type="text" class="form-control" autocomplete="off" id="bairro" name="bairro" size="40" value="<?php
                                             echo $row_msg_contatos["bairro"];
                                             ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Cidade</label>
                                          <input type="text" class="form-control" autocomplete="off" id="cidade" name="cidade" size="40" value="<?php
                                             echo $row_msg_contatos["cidade"];
                                             ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Estado</label>
                                          <input type="text" class="form-control" autocomplete="off" id="uf" name="uf" size="2" value="<?php
                                             echo $row_msg_contatos["estado"];
                                             ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Número</label>
                                          <input type="text" class="form-control" autocomplete="off" id="numero" name="numero" value="<?php
                                             echo $row_msg_contatos["numero"];
                                             ?>" required Readonly>
                                          <script type="text/javascript">
                                             $("#numero").mask("0000");
                                          </script>
                                       </div>
                                       <div class="form-group">
                                          <label>Complemento</label>
                                          <input type="text" class="form-control" autocomplete="off" id="complemento" size="50" name="complemento" value="<?php
                                             echo $row_msg_contatos["complemento"];
                                             ?>" Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" class="form-control" autocomplete="off" maxlength="70" id="email" name="email" value="<?php
                                             echo $row_msg_contatos["email"];
                                             ?>" required Readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Senha</label>
                                          <input type="password" class="form-control" autocomplete="off" maxlength="8" id="senha"  name="senha" value="<?php
                                             echo $row_msg_contatos["senha"];
                                             ?>" required Readonly>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <a href="#edit<?php
                           echo $row_msg_contatos["id_cliente"];
                           ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                        <a href="#delete<?php
                           echo $row_msg_contatos["id_cliente"];
                           ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar">&#xE872;</i></a>
                        <!-- Modo Excluir HTML -->
                                 <div id="delete<?php
                                 echo $row_msg_contatos["id_cliente"];
                                 ?>" class="modal fade">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <form method="post" action="deleta_registro_cliente.php" id="deleta_Cadastro_cliente">
                                    <div class="modal-header">
                                       <input type="hidden" name="id_cliente" value="<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>">
                                       <h4 class="modal-title">Deletar Cadastro</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                       <p>Você tem certeza que deseja excluir cadastro selecionado?</p>
                                       <p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                       <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                       <input type="submit" class="btn btn-danger" value="Deletar">
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </td>
                     <!-- INCLUIR NOVO HTML -->
                        <div id="addEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form method="post" action="salva_cadastro_cliente.php" id="Cadastro_cliente">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Novo Cadastro</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label>Nome Completo</label>
                                       <input type="text" maxlength="80" class="form-control" autocomplete="off" id="nome_completo" name="nome_completo" required>
                                    </div>
                                    <div class="form-group">
                                       <label>Data de Nascimento</label>
                                       <input type="text" class="form-control" autocomplete="off" id="data_nascimento" name="data_nascimento" required>
                                       <script type="text/javascript">
                                          $("#data_nascimento").mask("00/00/0000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>CPF</label>
                                       <input type="text" class="form-control" autocomplete="off" id="cpf" name="cpf" required>
                                       <script type="text/javascript">
                                          $("#cpf").mask("00000000000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>RG</label>
                                       <input type="text" class="form-control" autocomplete="off" id="rg" name="rg" required>
                                       <script type="text/javascript">
                                          $("#rg").mask("0000000000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>Telefone Residencial</label>
                                       <input type="text" class="form-control" autocomplete="off" id="tel_residencial" name="tel_residencial" required>
                                       <script type="text/javascript">
                                          $("#tel_residencial").mask("(00)0000-0000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>Telefone Celular</label>
                                       <input type="text" class="form-control" autocomplete="off" id="tel_celular" name="tel_celular" required>
                                       <script type="text/javascript">
                                          $("#tel_celular").mask("(00)00000-0000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          CEP:
                                          <input name="cep" class="form-control" autocomplete="off" type="text" id="cep" value="" size="10" maxlength="9"  
                                             onblur="pesquisacep(this.value);" />
                                          <script type="text/javascript">
                                             $("#cep").mask("00000-000");
                                          </script> 
                                    </div>
                                    <div class="form-group">
                                    <label>Rua</label>
                                    <input type="text" class="form-control" autocomplete="off" id="rua" name="rua" size="60" required Readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Bairro</label>
                                       <input type="text" class="form-control" autocomplete="off" id="bairro" name="bairro" size="40" required Readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Cidade</label>
                                       <input type="text" class="form-control" autocomplete="off" id="cidade" name="cidade" size="40" required Readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Estado</label>
                                       <input type="text" class="form-control" autocomplete="off" id="uf" name="uf" size="2" required Readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Número</label>
                                       <input type="text" class="form-control" autocomplete="off" id="numeroo" name="numero" required>
                                       <script type="text/javascript">
                                          $("#numero").mask("0000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>Complemento</label>
                                       <input type="text" class="form-control" autocomplete="off" id="complemento" size="50" name="complemento">
                                    </div>
                                    <div class="form-group">
                                       <label>Observações</label>
                                       <textarea class="form-control" size="100"  autocomplete="off" id="observacoes" name="observacoes" ></textarea>
                                    </div>
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="email" class="form-control" autocomplete="off" maxlength="70" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                       <label>Senha</label>
                                       <input type="password" class="form-control" autocomplete="off" maxlength="8" id="senha"  name="senha" required>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-success" value="Cadastrar">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- Modo Editar HTML -->    
                        <div id="edit<?php
                        echo $row_msg_contatos["id_cliente"];
                        ?>" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form method="post" action="salva_atualizacao_registro_cliente.php" id="Atualiza_Cadastro_cliente">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Editar Cadastro</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <input type="hidden" name="id_cliente" value="<?php
                                       echo $row_msg_contatos["id_cliente"];?>">
                                     
                                    <div class="form-group">
                                       <label>Nome Completo</label>
                                       <input type="text" maxlength="80" class="form-control" autocomplete="off" id="nome_completo" name="nome_completo" value="<?php echo $row_msg_contatos["nome_completo"];
                                          ?>" required>
                                    </div>
                                     
                                    <div class="form-group">
                                       <label for="id_situacao">Situacão Cadastral</label>
                                       <select class="form-control" id="id_situacao" name='id_situacao'>
                                       <?php
                                          echo "<option selected>" . $row_msg_contatos["id_situacao"] . "</option>";
                                          echo ($row_msg_contatos["id_situacao"] == "Ativo") ? "<option value='Inadimplente'>Inadimplente</option>" : "<option value='Ativo'>Ativo</option>";
                                          ?>
                                       </select>
                                    </div>
                                     
                                    <div class="form-group">
                                       <label>Data de Nascimento</label>
                                       <input type="text" class="form-control" data-mask="00/00/0000" maxlength="10" autocomplete="off" id="edita_data_nascimento<?php echo $row_msg_contatos["id_cliente"]; ?>" name="data_nascimento" value="<?php echo $row_msg_contatos["data_nascimento"]; ?>" oninput="$('#' + this.id).mask('00/00/0000');" required>
                                        <script>
                                            $('#' + "edita_data_nascimento<?php echo $row_msg_contatos["id_cliente"];?>)").mask('00/00/0000;"');
                                        </script>
                                    </div>
                                     
                                    <div class="form-group">
                                       <label>CPF</label>
                                       <input type="text" class="form-control cpf-mask" autocomplete="off" id="edita_cpf<?php echo $row_msg_contatos["id_cliente"]; ?>" name="cpf" value="<?php echo $row_msg_contatos["cpf"];?>" 
                                        ontoggle = "$('#' + this.id).mask('000.000.000-00');" oninput="$('#' + this.id).mask('00000000000');" required>
                                    </div>

                                    <div class="form-group">
                                       <label>RG</label>
                                       <input type="text" class="form-control rg-mask" autocomplete="off" id="edita_rg<?php echo $row_msg_contatos["id_cliente"]; ?>" name="edita_rg" value="<?php echo $row_msg_contatos["rg"];?>" 
                                        ontoggle = "$('#' + this.id).mask('0000000000');" oninput="$('#' + this.id).mask('0000000000');" required>
                                    </div> 
                                     
                                    <div class="form-group">
                                       <label>Telefone Residencial</label>
                                       <input type="text" class="form-control" autocomplete="off" id="edita_tel_residencial<?php echo $row_msg_contatos["id_cliente"];?>" 
                                       name="tel_residencial" value="<?php echo $row_msg_contatos["telefone_residencial"];?>" oninput="$('#' + this.id).mask('(00)0000-0000')" required>
                                       
                                        <script type="text/javascript">
                                          $('#' + "edita_tel_residencial<?php echo $row_msg_contatos["id_cliente"];?>").mask("(00)0000-0000");
                                       </script>
                                    </div>
                                     
                                     
                                    <div class="form-group">
                                       <label>Telefone Celular</label>
                                       <input type="text" class="form-control" autocomplete="off" id="edita_tel_celular<?php echo $row_msg_contatos["id_cliente"];?>" name="tel_celular" value="<?php echo $row_msg_contatos["telefone_celular"];
                                          ?>" required>
                                       <script type="text/javascript">
                                          $('#' + "edita_tel_celular<?php echo $row_msg_contatos["id_cliente"];?>").mask("(00)00000-0000");
                                       </script>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          CEP:
                                          <input name="cep" class="form-control" value="<?php echo $row_msg_contatos["cep"];?>" autocomplete="off" type="text" id="edita_cep<?php
                                             echo $row_msg_contatos["id_cliente"];?>" size="10" maxlength="9" oninput="$('#' + this.id).mask('00.000-000')" onblur="pesquisacepedit(this.value, this.id);" /> <!-- o evento envia a infomação de valor, para busca do CEP, e de id, para 
                                             identificar para qual campo deve retornar o valor do callback-->
                                          <!-- <script type="text/javascript">
                                             $("#edita_cep").mask("00000-000");
                                             </script> -->
                                    </div>
                                    <div class="form-group">
                                    <label>Rua</label>
                                    <input type="text" class="form-control" autocomplete="off" id="rua<?php echo $row_msg_contatos["id_cliente"]; ?>" name="rua" size="60" value="<?php
                                       echo $row_msg_contatos["rua"];
                                       ?>" required Readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label>Bairro</label>
                                       <input type="text" class="form-control" autocomplete="off" id="bairro<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>" name="bairro" size="40" value="<?php
                                          echo $row_msg_contatos["bairro"];
                                          ?>" required Readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label>Cidade</label>
                                       <input type="text" class="form-control" autocomplete="off" id="cidade<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>" name="cidade" size="40" value="<?php
                                          echo $row_msg_contatos["cidade"];
                                          ?>" required Readonly>
                                    </div>
                                        
                                    <div class="form-group">
                                       <label>Estado</label>
                                       <input type="text" class="form-control" autocomplete="off" id="uf<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>" name="uf" size="2" value="<?php
                                          echo $row_msg_contatos["estado"];
                                          ?>" required Readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Número</label>
                                       <input type="text" class="form-control" autocomplete="off" id="numero<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>" name="numero" value="<?php
                                          echo $row_msg_contatos["numero"];
                                          ?>" required>
                                       <script type="text/javascript">
                                          $("#numero<?php
                                             echo $row_msg_contatos["id_cliente"];
                                             ?>").mask("0000");
                                       </script>
                                    </div>
                                        
                                    <div class="form-group">
                                       <label>Complemento</label>
                                       <input type="text" class="form-control" autocomplete="off" id="complemento<?php
                                          echo $row_msg_contatos["id_cliente"];
                                          ?>" size="50" name="complemento" value="<?php
                                          echo $row_msg_contatos["complemento"];
                                          ?>" >
                                    </div>
                                        
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="email" class="form-control" autocomplete="off" maxlength="70" id="email" name="email" value="<?php
                                          echo $row_msg_contatos["email"];
                                          ?>" required>
                                    </div>
                                        
                                    <div class="form-group">
                                       <label>Senha</label>
                                       <input type="password" class="form-control" autocomplete="off" maxlength="8" id="senha"  name="senha" value="<?php
                                          echo $row_msg_contatos["senha"];
                                          ?>" required>
                                    </div>
                                        
                                 </div>
                                 <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-info" value="Salvar">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </tr>
                  <?php
                     }
                     ?>      
               </tbody>
            </table>
         </div>
      </div>
   </body>
</html>