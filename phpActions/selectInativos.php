<?php 
    require_once("connectUsers.php");

    //VERIFICAR QUAL USER SERÁ LIBERADO
    if(isset($_POST['btnLiberar'])){
      $idUser = $_POST['idUser'];
      
      //QUERY PARA FAZER O UPDATE
      $query = "UPDATE users SET estado='ativo' WHERE iduser='$idUser'";

      //UTILIZANDO A QUERY
      $result = mysqli_query($connect,$query);

    }

    // QUERY PARA SELECIONAR OS USUARIOS INATIVOS
    $query = "SELECT * FROM users WHERE estado = 'inativo'";

    $result = mysqli_query($connect,$query);
    // var_dump($result);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $idUser =  $row['iduser'];
            $nome =  $row['nome'];
            $rm =  $row['rm'];
            $email =  $row['email'];
            $telefone = $row['telefone'];
            $turma = $row['turma'];
?>
       <div class="cardLib">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
          <input type="number" hidden value="<?php echo $idUser?>" name="idUser">
            <div class="cardIcon">
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
                    d="M19.5119 5.85L13.5719 2.42C12.6019 1.86 11.4019 1.86 10.4219 2.42L4.49187 5.85C3.52187 6.41 2.92188 7.45 2.92188 8.58V15.42C2.92188 16.54 3.52187 17.58 4.49187 18.15L10.4319 21.58C11.4019 22.14 12.6019 22.14 13.5819 21.58L19.5219 18.15C20.4919 17.59 21.0919 16.55 21.0919 15.42V8.58C21.0819 7.45 20.4819 6.42 19.5119 5.85ZM12.0019 7.34C13.2919 7.34 14.3319 8.38 14.3319 9.67C14.3319 10.96 13.2919 12 12.0019 12C10.7119 12 9.67188 10.96 9.67188 9.67C9.67188 8.39 10.7119 7.34 12.0019 7.34ZM14.6819 16.66H9.32187C8.51187 16.66 8.04187 15.76 8.49187 15.09C9.17187 14.08 10.4919 13.4 12.0019 13.4C13.5119 13.4 14.8319 14.08 15.5119 15.09C15.9619 15.75 15.4819 16.66 14.6819 16.66Z"
                    fill="#292D32"
                  ></path>
                </g>
              </svg>
            </div>
            <div class="cardInfo">
              <h1><?php echo $nome?></h1>
              <p>RM: <?php echo $rm?></p>
              <p>Email: <?php echo $email?></p>
              <p>Telefone: <?php echo $telefone?></p>
              <p>Turma: <?php echo $turma?></p>
            </div>
            <div class="btnsLib">
              <button type="submit" class="btnLiberar" name="btnLiberar">
                <svg
                  fill="#000000"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <defs>
                      <style>
                        .cls-1 {
                          fill-rule: evenodd;
                        }
                      </style>
                    </defs>
                    <path
                      id="accept"
                      class="cls-1"
                      d="M1008,120a12,12,0,1,1,12-12A12,12,0,0,1,1008,120Zm0-22a10,10,0,1,0,10,10A10,10,0,0,0,1008,98Zm-0.08,14.333a0.819,0.819,0,0,1-.22.391,0.892,0.892,0,0,1-.72.259,0.913,0.913,0,0,1-.94-0.655l-2.82-2.818a0.9,0.9,0,0,1,1.27-1.271l2.18,2.184,4.46-7.907a1,1,0,0,1,1.38-.385,1.051,1.051,0,0,1,.36,1.417Z"
                      transform="translate(-996 -96)"
                    ></path>
                  </g>
                </svg>
                  Liberar
              </button>
              <button type="submit" class="btnRecusar" name="btnRecusar">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8.00386 9.41816C7.61333 9.02763 7.61334 8.39447 8.00386 8.00395C8.39438 7.61342 9.02755 7.61342 9.41807 8.00395L12.0057 10.5916L14.5907 8.00657C14.9813 7.61605 15.6144 7.61605 16.0049 8.00657C16.3955 8.3971 16.3955 9.03026 16.0049 9.42079L13.4199 12.0058L16.0039 14.5897C16.3944 14.9803 16.3944 15.6134 16.0039 16.0039C15.6133 16.3945 14.9802 16.3945 14.5896 16.0039L12.0057 13.42L9.42097 16.0048C9.03045 16.3953 8.39728 16.3953 8.00676 16.0048C7.61624 15.6142 7.61624 14.9811 8.00676 14.5905L10.5915 12.0058L8.00386 9.41816Z" fill="#0F0F0F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#0F0F0F"></path> </g></svg>
                Recusar
              </button>
            </div>
        </form>
      </div>
<?php
        }
    }else{
      echo "<h1>SEM USUÁRIOS PARA LIBERAR</h1>";
    }
?>