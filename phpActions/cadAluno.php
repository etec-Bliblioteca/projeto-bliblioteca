<?php
if (isset($_POST['btnCadastrar'])) {
    require_once("connectUsers.php");
    $txtNome = $_POST['txtNome'];
    $numRM = $_POST['numRM'];
    $slAno = $_POST['slAno'];
    $slTurma = $_POST['slTurma'];
    $slPeriodo = $_POST['slPeriodo'];
    $txtEmail = $_POST['txtEmail'];
    $numTel = $_POST['numTel'];
    $txtSenha = $_POST['txtSenha'];
    $txtTurma =  $slAno . " " . $slTurma . " " . $slPeriodo;

    $query = "INSERT INTO users (rm,turma,nome,email,telefone,senha,estado) VALUES ($numRM,'$txtTurma','$txtNome','$txtEmail',$numTel,'$txtSenha','inativo')";

    $result = mysqli_query($connect, $query);
    if ($result) {
?>
        <style>
            /* From Uiverse.io by kennyotsu */
            /* RIP Uiverse points, welcome Creator points! */

            .card-id567 {
                width: 190px;
                height: 190px;
                background: rgb(255, 255, 255);
                border-radius: 1rem;
                padding: 1rem;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: 300ms ease;
                animation: 8s thumb-thumb infinite;
                border: 1px solid black;
            }

            .card-id567 svg path {
                transition: 300ms ease;
                stroke: rgb(20, 20, 20);
                opacity: 0;
            }

            .bold-567 {
                font-weight: bold;
            }

            .blurry-splash {
                position: absolute;
                inset: 0;
                width: 60px;
                margin: 0 auto;
                height: 60px;
                border-radius: 1rem;
                z-index: -1;
                opacity: 70%;
                filter: blur(15px);
                background: linear-gradient(120deg, rgb(119, 0, 255), rgb(22, 94, 250), rgb(44, 226, 250));
            }

            .prompt-id567 {
                position: absolute;
                color: rgb(29, 29, 29);
                text-align: center;
            }

            .really-small-text {
                text-align: center;
                width: 100%;
                position: absolute;
                font-size: 8px;
                margin-top: 28px;
                opacity: 0.5;
            }

            .token-container {
                animation: 2s spinny-token-yayyy infinite;
                margin-bottom: 10px;
            }

            .prompt-id567 svg path {
                stroke: none;
                opacity: 1;
            }


            @keyframes spinny-token-yayyy {
                0% {
                    transform: perspective(200px) rotateY(0deg);
                }

                100% {
                    transform: perspective(200px) rotateY(360deg);
                }
            }

            @keyframes thumb-thumb {

                0%,
                10%,
                100% {
                    transform: scale(100%);
                }

                5% {
                    transform: scale(103%);
                }

                7% {
                    transform: scale(97%);
                }
            }
        </style>
        <div class="card-id567">
    
            <div class="prompt-id567">
                <div class="token-container">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" height="50" width="50">
                        <path fill="url(#paint0_linear_713_51)" d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18V18ZM10 5.05L14.95 10L10 14.95L5.05 10L10 5.05V5.05ZM10 7.879L7.879 10L10 12.121L12.121 10L10 7.879V7.879Z"></path>
                        <defs>
                            <linearGradient gradientUnits="userSpaceOnUse" y2="22.6007" x2="16.4204" y1="0" x1="0" id="paint0_linear_713_51">
                                <stop stop-color="#AF40FF"></stop>
                                <stop stop-color="#5B42F3" offset="0.5"></stop>
                                <stop stop-color="#00DDEB" offset="1"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="blurry-splash"></div>
                <p><span class="bold-567">AGUARDANDO A ATIVAÇÂO</span> </p>
            </div>
        </div>
        <a href="../index.html">Voltar a Página Inicial</a>
<?php
    }

    // echo $txtNome . "<br/>";
    // echo $numRM . "<br/>";
    // echo $txtEmail . "<br/>";
    // echo $numTel . "<br/>";
    // echo $txtSenha . "<br/>";
    // // echo "Turma: " . $slAno . " " .$slTurma . " " . $slPeriodo . "<br/>";
    // echo $txtTurma . "<br/>";
}
?>