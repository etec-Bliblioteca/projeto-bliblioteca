<?php require_once('../phpActions/verificarLogin.php');?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link
      rel="shortcut icon"
      href="../imagens/logoBliblioteca.png"
      type="image/x-icon"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/header.css" />
    <link rel="stylesheet" href="../style/section.css" />
    <link rel="stylesheet" href="../style/reset.css" />
    <link rel="stylesheet" href="../style/formRevista.css" />
    <title>Adicionar Revista</title>
  </head>
  <body>
    <header>
      <img src="../imagens/logoBliblioteca.png" alt="Logo da Bliblioteca" />
      <label class="hamburger" id="btnMenu">
        <input type="checkbox" id="btnCheckbox" />
        <svg viewBox="0 0 32 32">
          <path
            class="line line-top-bottom"
            d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"
          ></path>
          <path class="line" d="M7 16 27 16"></path>
        </svg>
      </label>
    </header>
    <nav class="menu" id="menu">
      <img
        src="../imagens/logoBliblioteca.png"
        alt="Logo da Etec"
        class="logoEtec"
      />
      <a href="../admin.php">
        <div class="linkIcon">
          <svg
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M4.18753 11.3788C4.03002 11.759 4 11.9533 4 12V20.0018C4 20.5529 4.44652 21 5 21H8V15C8 13.8954 8.89543 13 10 13H14C15.1046 13 16 13.8954 16 15V21H19C19.5535 21 20 20.5529 20 20.0018V12C20 11.9533 19.97 11.759 19.8125 11.3788C19.6662 11.0256 19.4443 10.5926 19.1547 10.1025C18.5764 9.1238 17.765 7.97999 16.8568 6.89018C15.9465 5.79788 14.9639 4.78969 14.0502 4.06454C13.5935 3.70204 13.1736 3.42608 12.8055 3.2444C12.429 3.05862 12.1641 3 12 3C11.8359 3 11.571 3.05862 11.1945 3.2444C10.8264 3.42608 10.4065 3.70204 9.94978 4.06454C9.03609 4.78969 8.05348 5.79788 7.14322 6.89018C6.23505 7.97999 5.42361 9.1238 4.8453 10.1025C4.55568 10.5926 4.33385 11.0256 4.18753 11.3788ZM10.3094 1.45091C10.8353 1.19138 11.4141 1 12 1C12.5859 1 13.1647 1.19138 13.6906 1.45091C14.2248 1.71454 14.7659 2.07921 15.2935 2.49796C16.3486 3.33531 17.4285 4.45212 18.3932 5.60982C19.3601 6.77001 20.2361 8.0012 20.8766 9.08502C21.1963 9.62614 21.4667 10.1462 21.6602 10.6134C21.8425 11.0535 22 11.5467 22 12V20.0018C22 21.6599 20.6557 23 19 23H16C14.8954 23 14 22.1046 14 21V15H10V21C10 22.1046 9.10457 23 8 23H5C3.34434 23 2 21.6599 2 20.0018V12C2 11.5467 2.15748 11.0535 2.33982 10.6134C2.53334 10.1462 2.80369 9.62614 3.12345 9.08502C3.76389 8.0012 4.63995 6.77001 5.60678 5.60982C6.57152 4.45212 7.65141 3.33531 8.70647 2.49796C9.2341 2.07921 9.77521 1.71454 10.3094 1.45091Z"
                fill="#0F0F0F"
              ></path>
            </g>
          </svg>
        </div>
        Home
      </a>

      <a href="../pedidos.php">
        <div class="linkIcon">
          <svg
            fill="#000000"
            viewBox="0 0 32 32"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <title>book-blank</title>
              <path
                d="M27.75 2c-0-0.414-0.336-0.75-0.75-0.75h-19.8c-0.028-0.001-0.061-0.002-0.094-0.002-1.541 0-2.797 1.22-2.856 2.746l-0 0.005v24.389c0.113 1.331 1.221 2.367 2.572 2.367 0.063 0 0.125-0.002 0.187-0.007l-0.008 0h20c0.414 0 0.75-0.336 0.75-0.75s-0.336-0.75-0.75-0.75v0h-19.8c-0.023 0.001-0.050 0.002-0.077 0.002-0.717 0-1.306-0.547-1.373-1.247l-0-0.006v-1.223c0-0.459 0.584-0.861 1.248-0.861l20.002 0.057c0 0 0.001 0 0.001 0 0.207 0 0.394-0.084 0.529-0.22l0-0c0.017-0.017 0.025-0.041 0.040-0.060 0.047-0.051 0.087-0.11 0.118-0.173l0.002-0.004c0.016-0.049 0.029-0.105 0.034-0.164l0-0.003c0.011-0.035 0.020-0.077 0.025-0.121l0-0.003v-0.002zM26.25 24.471l-15.5-0.044v-21.677h15.5zM5.75 24.686v-20.686c0.067-0.705 0.657-1.252 1.374-1.252 0.027 0 0.054 0.001 0.080 0.002l-0.004-0h2.050v21.672l-2.25-0.006c-0.453 0.002-0.883 0.101-1.269 0.278l0.019-0.008z"
              ></path>
            </g>
          </svg>
        </div>
        Pedidos
      </a>

      <a href="../liberacao.php">
        <div class="linkIcon">
          <svg
            version="1.1"
            id="_x32_"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 512 512"
            xml:space="preserve"
            fill="#000000"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #ffffff;
                }
              </style>
              <g>
                <path
                  class="st0"
                  d="M186.984,203.297v-81.578c0.016-19.141,7.688-36.219,20.219-48.813C219.766,60.391,236.859,52.719,256,52.703 c19.141,0.016,36.234,7.688,48.813,20.203c12.531,12.594,20.203,29.672,20.219,48.813v43.406h52.703v-43.406 c0.016-33.531-13.672-64.125-35.656-86.063C320.125,13.656,289.531-0.016,256,0c-33.531-0.016-64.125,13.656-86.063,35.656 c-22,21.938-35.672,52.531-35.656,86.063v81.578H46.438V512h419.125v-26.344V203.297H186.984z M99.141,256h313.719v203.297H99.141 V256z"
                ></path>
                <path
                  class="st0"
                  d="M293.969,339.547c0-20.969-17-37.953-37.969-37.953s-37.953,16.984-37.953,37.953 c0,15.453,9.266,28.703,22.516,34.609l-8.391,54.5H256h23.844l-8.406-54.5C284.688,368.25,293.969,355,293.969,339.547z"
                ></path>
              </g>
            </g>
          </svg>
        </div>
        Liberação
      </a>

      <a href="../adicionar.php" class="active">
        <div class="linkIcon">
          <svg
            fill="#000000"
            viewBox="0 0 16 16"
            id="register-16px"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <path
                id="Path_184"
                data-name="Path 184"
                d="M57.5,41a.5.5,0,0,0-.5.5V43H47V31h2v.5a.5.5,0,0,0,.5.5h5a.5.5,0,0,0,.5-.5V31h2v.5a.5.5,0,0,0,1,0v-1a.5.5,0,0,0-.5-.5H55v-.5A1.5,1.5,0,0,0,53.5,28h-3A1.5,1.5,0,0,0,49,29.5V30H46.5a.5.5,0,0,0-.5.5v13a.5.5,0,0,0,.5.5h11a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,57.5,41ZM50,29.5a.5.5,0,0,1,.5-.5h3a.5.5,0,0,1,.5.5V31H50Zm11.854,4.646-2-2a.5.5,0,0,0-.708,0l-6,6A.5.5,0,0,0,53,38.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.354-.146l6-6A.5.5,0,0,0,61.854,34.146ZM54,40V38.707l5.5-5.5L60.793,34.5l-5.5,5.5Zm-2,.5a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1,0-1h2A.5.5,0,0,1,52,40.5Zm0-3a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1,0-1h2A.5.5,0,0,1,52,37.5ZM54.5,35h-5a.5.5,0,0,1,0-1h5a.5.5,0,0,1,0,1Z"
                transform="translate(-46 -28)"
              ></path>
            </g>
          </svg>
        </div>
        Adicionar
      </a>

      <a href="../login.php " class="btnLogin">
        <div class="linkIcon">
          <svg
            fill="#000000"
            viewBox="0 0 32 32"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <path
                d="M16.642 20.669c-0.391 0.39-0.391 1.023-0 1.414 0.195 0.195 0.451 0.293 0.707 0.293s0.512-0.098 0.707-0.293l5.907-6.063-5.907-6.063c-0.39-0.39-1.023-0.39-1.414 0s-0.391 1.024 0 1.414l3.617 3.617h-19.264c-0.552 0-1 0.448-1 1s0.448 1 1 1h19.326zM30.005 0h-18c-1.105 0-2.001 0.895-2.001 2v9h2.014v-7.78c0-0.668 0.542-1.21 1.21-1.21h15.522c0.669 0 1.21 0.542 1.21 1.21l0.032 25.572c0 0.668-0.541 1.21-1.21 1.21h-15.553c-0.668 0-1.21-0.542-1.21-1.21v-7.824l-2.014 0.003v9.030c0 1.105 0.896 2 2.001 2h18c1.105 0 2-0.895 2-2v-28c-0.001-1.105-0.896-2-2-2z"
              ></path>
            </g>
          </svg>
        </div>
        Sair</a
      >
    </nav>
    <section class="adm">
      <article class="adicionar">
        <form
          action="../phpActions/addRevista.php"
          class="formRevista"
          method="POST"
          enctype="multipart/form-data"
        >
          <h1>Adicionar Revista</h1>
          <div class="campoForm">
            <div class="input-group">
              <label class="label">Nome da Revista:</label>
              <input
                autocomplete="off"
                name="txtNomeRevista"
                id="txtNomeRevista"
                class="input"
                type="text"
              />
            </div>
            <div class="input-group">
              <label class="label">Tema:</label>
              <input
                autocomplete="off"
                name="txtTema"
                id="txtTema"
                class="input"
                type="text"
              />
            </div>
          </div>
          <div class="input-group">
            <label class="label">Descrição:</label>
            <textarea
              autocomplete="off"
              name="txtDesc"
              id="txtDesc"
              class="input"
              type="text"
            ></textarea>
          </div>
          <div class="input-group">
            <label class="label">Quantidade:</label>
            <input
              autocomplete="off"
              name="numQTDE"
              id="numQTDE"
              class="input"
              type="number"
              min="0"
            />
          </div>
          <div class="campoForm" id="campo-img">
            <div class="input-group">
              <label class="label">Capa:</label>
              <label for="imgCapa" class="inputImg">
                <svg
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M12 8L12 16"
                      stroke="#323232"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                    <path
                      d="M15 11L12.087 8.08704V8.08704C12.039 8.03897 11.961 8.03897 11.913 8.08704V8.08704L9 11"
                      stroke="#323232"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                    <path
                      d="M3 15L3 16L3 19C3 20.1046 3.89543 21 5 21L19 21C20.1046 21 21 20.1046 21 19L21 16L21 15"
                      stroke="#323232"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                  </g>
                </svg>
                <input type="file" name="imgCapa" id="imgCapa" />
              </label>
            </div>
            <div class="input-group">
              <label class="label">Preview:</label>
              <div class="campoImgPreview" id="campoImgPreview">
                <!-- <img src="#" alt="preview" class="imgCapaPreview" id="imgCapaPreview" /> -->
              </div>
            </div>
          </div>
          <div class="campoForm">
            <button type="submit" id="btnCadastrar" name="btnCadastrar">
              <svg
                fill="#000000"
                viewBox="0 0 64 64"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                xml:space="preserve"
                xmlns:serif="http://www.serif.com/"
                style="
                  fill-rule: evenodd;
                  clip-rule: evenodd;
                  stroke-linejoin: round;
                  stroke-miterlimit: 2;
                "
              >
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g
                  id="SVGRepo_tracerCarrier"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                ></g>
                <g id="SVGRepo_iconCarrier">
                  <rect
                    id="Icons"
                    x="-1024"
                    y="0"
                    width="1280"
                    height="800"
                    style="fill: none"
                  ></rect>
                  <g id="Icons1" serif:id="Icons">
                    <g id="Strike"></g>
                    <g id="H1"></g>
                    <g id="H2"></g>
                    <g id="H3"></g>
                    <g id="list-ul"></g>
                    <g id="hamburger-1"></g>
                    <g id="hamburger-2"></g>
                    <g id="list-ol"></g>
                    <g id="list-task"></g>
                    <g id="trash"></g>
                    <g id="vertical-menu"></g>
                    <g id="horizontal-menu"></g>
                    <g id="sidebar-2"></g>
                    <g id="Pen"></g>
                    <g id="Pen1" serif:id="Pen">
                      <path
                        d="M55.944,51.712l0,4.201l-33.652,-0.027l4.71,-4.174l28.942,0Zm-7.555,-43.712c1.649,0 2.505,0.128 4.752,2.011c2.294,1.921 2.707,3.419 2.803,5.087c0.102,1.795 -0.504,3.976 -2.188,5.681l-31.961,31.961c-0.52,0.475 -0.629,0.45 -0.977,0.553l-10.226,2.557c-1.472,0.299 -2.854,-1.049 -2.55,-2.55l2.557,-10.226c0.1,-0.334 0.133,-0.517 0.553,-0.976c10.696,-10.697 21.195,-21.594 32.09,-32.087c1.421,-1.335 3.497,-2.011 5.147,-2.011Zm-32.375,35.182l-1.477,1.477l-1.566,6.262l6.262,-1.566c0.493,-0.492 0.985,-0.983 1.479,-1.474l-4.698,-4.699Zm30.176,-20.573l-4.802,-4.801l-22.493,22.493l4.712,4.713c7.549,-7.448 15.196,-14.801 22.583,-22.405Zm2.826,-2.936c0.618,-0.648 1.234,-1.298 1.848,-1.951c1.673,-1.826 0.443,-5.454 -2.307,-5.578c-0.056,-0.002 -0.112,-0.002 -0.168,-0.002c-0.861,0.016 -1.699,0.372 -2.312,0.977l-1.807,1.808l4.746,4.746Z"
                        style="fill-rule: nonzero"
                      ></path>
                    </g>
                    <g id="clock"></g>
                    <g id="external-link"></g>
                    <g id="hr"></g>
                    <g id="info"></g>
                    <g id="warning"></g>
                    <g id="plus-circle"></g>
                    <g id="minus-circle"></g>
                    <g id="vue"></g>
                    <g id="cog"></g>
                    <g id="logo"></g>
                    <g id="radio-check"></g>
                    <g id="eye-slash"></g>
                    <g id="eye"></g>
                    <g id="toggle-off"></g>
                    <g id="shredder"></g>
                    <g
                      id="spinner--loading--dots-"
                      serif:id="spinner [loading, dots]"
                    ></g>
                    <g id="react"></g>
                    <g id="check-selected"></g>
                    <g id="turn-off"></g>
                    <g id="code-block"></g>
                    <g id="user"></g>
                    <g id="coffee-bean"></g>
                    <g id="coffee-beans">
                      <g id="coffee-bean1" serif:id="coffee-bean"></g>
                    </g>
                    <g id="coffee-bean-filled"></g>
                    <g id="coffee-beans-filled">
                      <g id="coffee-bean2" serif:id="coffee-bean"></g>
                    </g>
                    <g id="clipboard"></g>
                    <g id="clipboard-paste"></g>
                    <g id="clipboard-copy"></g>
                    <g id="Layer1"></g>
                  </g>
                </g>
              </svg>
              Cadastrar
            </button>
            <a href="../adicionar.html" id="btnCancelar">
              <svg
                fill="#000000"
                viewBox="0 0 32 32"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g
                  id="SVGRepo_tracerCarrier"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                ></g>
                <g id="SVGRepo_iconCarrier">
                  <title>cancel1</title>
                  <path
                    d="M16 29c-7.18 0-13-5.82-13-13s5.82-13 13-13 13 5.82 13 13-5.82 13-13 13zM16 6c-5.522 0-10 4.478-10 10s4.478 10 10 10c5.523 0 10-4.478 10-10s-4.477-10-10-10zM20.537 19.535l-1.014 1.014c-0.186 0.186-0.488 0.186-0.675 0l-2.87-2.87-2.87 2.87c-0.187 0.186-0.488 0.186-0.675 0l-1.014-1.014c-0.186-0.186-0.186-0.488 0-0.675l2.871-2.869-2.871-2.87c-0.186-0.187-0.186-0.489 0-0.676l1.014-1.013c0.187-0.187 0.488-0.187 0.675 0l2.87 2.87 2.87-2.87c0.187-0.187 0.489-0.187 0.675 0l1.014 1.013c0.186 0.187 0.186 0.489 0 0.676l-2.871 2.87 2.871 2.869c0.186 0.187 0.186 0.49 0 0.675z"
                  ></path>
                </g>
              </svg>
              Cancelar
            </a>
          </div>
        </form>
      </article>
    </section>
    <script src="../script/addRevista.js"></script>
  </body>
</html>
