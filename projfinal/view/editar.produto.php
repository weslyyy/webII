<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Wesly De Andrade Moraes">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <link rel="stylesheet" href="../css/estilo.css">
  <script type="text/javascript" src="../js/script.js"></script>
  <title>Editar Produto</title>
</head>

<body>
  <main id="principal">
    <section id="tela_cadastro_produto">
      <h1 class="text-center">Editar Produto</h2>
        <?php
          if (isset($_SESSION['produtos'])) {
            include_once '../model/produto.class.php';

            $p1 = unserialize($_SESSION['produtos']);
          }

         ?>
         <form id="produto_container" class="row g-3" action="../controller/produto.controller.php?op=confirmar_edicao" method="post" enctype="multipart/form-data">
           <div id="produto_capa" class="text-center" style="position: relative;">
             <div id="produto_ativar_click" onClick="ativarClick()">
               <h4>Alterar Imagem</h4>
             </div>
             <img src="../img/placeholder.jpg" id="produto_placeholder">
           </div>
           <input type="file" name="input-imagem" onChange="mostrarPreview(this)" id="produto_imagem" class="form-control">
           <div class="row g-3">
             <div class="col-md-12">
               <label class="form-label">Código do produto (automático)</label>
               <input type="text" name="input-id_produto" value="<?php echo $p1[0]->id_produto ?>" class="form-control" id="exampleFormControlInput1" readonly="readonly" >
             </div>
           </div>
           <div class="row g-3">
             <div class="col-md-6">
               <label class="form-label">Nome<span class="red">*</span></label>
               <input type="text" name="input-nome" required value="<?php echo $p1[0]->nome ?>" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
             </div>
             <div class="col-md-6">
               <label class="form-label">Categoria</label>
               <select class="form-select" name="input-tipo" aria-label="Default select example">
                 <option value="Outros" selected>Outros</option>
                 <option value="Cosméticos">Cosméticos</option>
                 <option value="Eletrodomésticos">Eletrodomésticos</option>
                 <option value="Eletrônicos">Eletrônicos</option>
                 <option value="Games">Games</option>
                 <option value="Higiene Pessoal">Higiene Pessoal</option>
                 <option value="Livros">Livros</option>
                 <option value="Material Escolar">Material Escolar</option>
                 <option value="Móveis">Móveis</option>
                 <option value="Roupas">Roupas</option>
               </select>
             </div>
           </div>
           <div class="row g-3">
             <div class="col-md-6">
               <label class="form-label">Valor</label>
               <input type="text" name="input-valor" value="<?php echo $p1[0]->valor ?>" class="form-control" id="exampleFormControlInput1">
             </div>
             <div class="col-md-6">
               <label class="form-label">Quantidade</label>
               <input type="number" name="input-quantidade" value="<?php echo $p1[0]->quantidade ?>" class="form-control" id="exampleFormControlInput1">
             </div>
           </div>
           <div class="row g-3">
             <div class="col-md-12">
               <label class="form-label">Descrição</label>
               <textarea class="form-control" name="input-descricao" id="exampleFormControlTextarea1" rows="8"><?php echo $p1[0]->descricao ?></textarea>
             </div>
           </div>
           <div class="row g-3">
             <div class="col-6">
               <button type="submit" class="btn btn-primary">Continuar</button>
             </div>
           </div>
         </form>
    </section>
  </main>
</body>

</html>
