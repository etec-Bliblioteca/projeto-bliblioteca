<?php
require_once('phpActions/verificarLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link
    rel="shortcut icon"
    href="imagens/logoBliblioteca.png"
    type="image/x-icon" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/reset.css" />
  <link rel="stylesheet" href="style/header.css" />
  <link rel="stylesheet" href="style/section.css" />
  <link rel="stylesheet" href="style/pesquisa.css" />
  <link rel="stylesheet" href="style/card.css" />
  <link rel="stylesheet" href="style/popup.css" />
  <title>Catalogo</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <header class="catalogo">
    <div class="input-container">
      <input
        type="search"
        name="text"
        class="input"
        id="btnPesquisa"
        name="btnPesquisa"
        placeholder="Pesquise por algo..." />
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="red"
        viewBox="0 0 24 24"
        class="icon">
        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
        <g
          stroke-linejoin="round"
          stroke-linecap="round"
          id="SVGRepo_tracerCarrier"></g>
        <g id="SVGRepo_iconCarrier">
          <rect fill="white" height="24" width="24"></rect>
          <path
            fill=""
            d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z"
            clip-rule="evenodd"
            fill-rule="evenodd"></path>
        </g>
      </svg>
    </div>

    <label class="hamburger" id="btnMenu">
      <input type="checkbox" id="btnCheckbox" />
      <svg viewBox="0 0 32 32">
        <path
          class="line line-top-bottom"
          d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"></path>
        <path class="line" d="M7 16 27 16"></path>
      </svg>
    </label>
  </header>
  <nav class="menu" id="menu">

    <img
      src="imagens/logoBliblioteca.png"
      alt="Logo da Etec"
      class="logoEtec" />

    <a href="index.php">
      <div class="linkIcon">
        <svg
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g
            id="SVGRepo_tracerCarrier"
            stroke-linecap="round"
            stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M4.18753 11.3788C4.03002 11.759 4 11.9533 4 12V20.0018C4 20.5529 4.44652 21 5 21H8V15C8 13.8954 8.89543 13 10 13H14C15.1046 13 16 13.8954 16 15V21H19C19.5535 21 20 20.5529 20 20.0018V12C20 11.9533 19.97 11.759 19.8125 11.3788C19.6662 11.0256 19.4443 10.5926 19.1547 10.1025C18.5764 9.1238 17.765 7.97999 16.8568 6.89018C15.9465 5.79788 14.9639 4.78969 14.0502 4.06454C13.5935 3.70204 13.1736 3.42608 12.8055 3.2444C12.429 3.05862 12.1641 3 12 3C11.8359 3 11.571 3.05862 11.1945 3.2444C10.8264 3.42608 10.4065 3.70204 9.94978 4.06454C9.03609 4.78969 8.05348 5.79788 7.14322 6.89018C6.23505 7.97999 5.42361 9.1238 4.8453 10.1025C4.55568 10.5926 4.33385 11.0256 4.18753 11.3788ZM10.3094 1.45091C10.8353 1.19138 11.4141 1 12 1C12.5859 1 13.1647 1.19138 13.6906 1.45091C14.2248 1.71454 14.7659 2.07921 15.2935 2.49796C16.3486 3.33531 17.4285 4.45212 18.3932 5.60982C19.3601 6.77001 20.2361 8.0012 20.8766 9.08502C21.1963 9.62614 21.4667 10.1462 21.6602 10.6134C21.8425 11.0535 22 11.5467 22 12V20.0018C22 21.6599 20.6557 23 19 23H16C14.8954 23 14 22.1046 14 21V15H10V21C10 22.1046 9.10457 23 8 23H5C3.34434 23 2 21.6599 2 20.0018V12C2 11.5467 2.15748 11.0535 2.33982 10.6134C2.53334 10.1462 2.80369 9.62614 3.12345 9.08502C3.76389 8.0012 4.63995 6.77001 5.60678 5.60982C6.57152 4.45212 7.65141 3.33531 8.70647 2.49796C9.2341 2.07921 9.77521 1.71454 10.3094 1.45091Z"
              fill="#0F0F0F"></path>
          </g>
        </svg>
      </div>
      Home
    </a>

    <a href="catalogo.php" class="active">
      <div class="linkIcon">
        <svg
          fill="#000000"
          viewBox="0 0 32 32"
          version="1.1"
          xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g
            id="SVGRepo_tracerCarrier"
            stroke-linecap="round"
            stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <title>book-blank</title>
            <path
              d="M27.75 2c-0-0.414-0.336-0.75-0.75-0.75h-19.8c-0.028-0.001-0.061-0.002-0.094-0.002-1.541 0-2.797 1.22-2.856 2.746l-0 0.005v24.389c0.113 1.331 1.221 2.367 2.572 2.367 0.063 0 0.125-0.002 0.187-0.007l-0.008 0h20c0.414 0 0.75-0.336 0.75-0.75s-0.336-0.75-0.75-0.75v0h-19.8c-0.023 0.001-0.050 0.002-0.077 0.002-0.717 0-1.306-0.547-1.373-1.247l-0-0.006v-1.223c0-0.459 0.584-0.861 1.248-0.861l20.002 0.057c0 0 0.001 0 0.001 0 0.207 0 0.394-0.084 0.529-0.22l0-0c0.017-0.017 0.025-0.041 0.040-0.060 0.047-0.051 0.087-0.11 0.118-0.173l0.002-0.004c0.016-0.049 0.029-0.105 0.034-0.164l0-0.003c0.011-0.035 0.020-0.077 0.025-0.121l0-0.003v-0.002zM26.25 24.471l-15.5-0.044v-21.677h15.5zM5.75 24.686v-20.686c0.067-0.705 0.657-1.252 1.374-1.252 0.027 0 0.054 0.001 0.080 0.002l-0.004-0h2.050v21.672l-2.25-0.006c-0.453 0.002-0.883 0.101-1.269 0.278l0.019-0.008z"></path>
          </g>
        </svg>
      </div>
      Catalogo
    </a>

    <?php
    //CRIA O LINK DE USER SE ESTIVER LOGADO OU CRIA O LINK PARA LOGAR 
    createLink();
    ?>
  </nav>
  <section class="catalogo" id="catalogo">
    <!-- <div class="containerCard" id="revista_1">
        <div class="cardImg">
          <img src="imagens/exemplar1.jpg" alt="imagem da revistas" />
        </div>
      </div> -->

    <?php
    // $numPages = $_SESSION['numPages'];
    // for($page = 1;$page<= $numPages;$page++){
    //     echo "<a href='?page={$page}'>[$page]</a>";
    // }
    ?>
  </section>

  <!-- <div class="bgPoup" id="bgPoup">
    <div class="containerPopUp">
      <button class="btnClose" id="btnClose">X</button>
      <img
        src=""
        alt="foto do popup"
        class="imgPopUp"
        id="imgPopUp" />
      <div class="containerInfoPopUp">
        <h1 id="nomeRevista">Nome do livro</h1>
        <p id="temaRevista">Tema: Davi Souza</p>
        <p id="qtdeRevista">Quantidade: infinita</p>
      </div>
      <div class="containerDescPopUp">
        <h1 class="descRevista">Descrição</h1>
        <p class="txtDesc" id="txtDesc">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
          ducimus accusamus sequi voluptas placeat quo quidem? Porro aliquid
          animi id in, magnam accusamus impedit ad repellendus nam.
          Blanditiis, voluptatum ea.
        </p>
      </div>
      <button class="btnReservar" id="inativo"></button> 
    </div>
  </div> -->
  <script src="script/menu.js"></script>
  <script src="script/catalogo.js" type="module"></script>
  <script src="script/pesquisa.js" type="module"></script>
</body>

</html>