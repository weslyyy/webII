<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Wesly De Andrade Moraes">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Todos os Produtos</title>
  </head>
  <body>
    <main id="principal">
      <section id="tela_buscar">
        <?php
          include '../dao/produto.dao.class.php';
          include '../model/produto.class.php';

          $produtoDao = new ProdutoDao();

          $produtos = $produtoDao->buscarProdutos();
        ?>

         <table class="table table-striped table-hover">
           <thead>
             <tr>
               <th>Código</th>
               <th>Nome</th>
               <th>Descrição</th>
               <th>Valor</th>
               <th>Quantidade</th>
               <th>Tipo</th>
               <th>Editar/Excluir</th>
             </tr>
           </thead>
           <tbody>
             <?php
              foreach ($produtos as $p1) {
                echo "
                <tr>
                  <td>".$p1->id_produto."</td>
                  <td>".$p1->nome."</td>
                  <td>".$p1->descricao."</td>
                  <td>".$p1->valor."</td>
                  <td>".$p1->quantidade."</td>
                  <td>".$p1->tipo."</td>
                  <td>
                  <a class=\"icon\" href=\"../controller/produto.controller.php?op=editar&id_produto=$p1->id_produto\">
                    <svg class=\"icon\" xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'>
                      <title>Editar</title>
                      <path d='M384 224v184a40 40 0 01-40 40H104a40 40 0 01-40-40V168a40 40 0 0140-40h167.48' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
                      <path d='M459.94 53.25a16.06 16.06 0 00-23.22-.56L424.35 65a8 8 0 000 11.31l11.34 11.32a8 8 0 0011.34 0l12.06-12c6.1-6.09 6.67-16.01.85-22.38zM399.34 90L218.82 270.2a9 9 0 00-2.31 3.93L208.16 299a3.91 3.91 0 004.86 4.86l24.85-8.35a9 9 0 003.93-2.31L422 112.66a9 9 0 000-12.66l-9.95-10a9 9 0 00-12.71 0z'/>
                    </svg>
                  </a>
                  &nbsp;
                  &nbsp;
                  <a class=\"icon\" href=\"../controller/produto.controller.php?op=excluir&id_produto=$p1->id_produto\">
                    <svg class=\"icon\" xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'>
                      <title>Excluir</title>
                      <path d='M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
                      <path stroke='currentColor' stroke-linecap='round' stroke-miterlimit='10' stroke-width='32' d='M80 112h352'/>
                      <path d='M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
                    </svg>

                  </a>
                  </td>
                </tr>
                ";
              }
              ?>
           </tbody>
         </table>
      </section>
    </main>
  </body>
</html>
