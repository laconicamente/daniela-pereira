<?php
//VariÃ¡veis
 
$nome = $_GET['nome'];
$email = trim($_GET['email']);
$mensagem = $_GET['mensagem'];
$data_envio = date("H:i d/m/Y", time());


// Compo E-mail
    $arquivo = "
    <style type='text/css'>
    body {
    margin:0px;
    font-family:Arial;
    font-size:12px;
    color: #666666;
    }
    a{
    color: #d9a300;
    text-decoration: none;
    }
    a:hover {
    color: #FF0000;
    text-decoration: none;
    }
    tr{
        padding-top:2%;
    }
    </style>
    <html>
        <table width='530' border='0' cellpadding='1' cellspacing='1' bgcolor='#ffffff'>
            <tr>
              <td><h3>MENSAGEM DO SITE LACONICAMENTE</h3></td>
            <tr>
                 <td width='500'><b>Nome:</b> $nome</td>
                </tr>
                <tr>
                  <td width='320'><b>E-mail:</b> $email</td>
                </tr>
                <tr>
                  <td width='320'><b>Mensagem:</b> $mensagem</td>
                </tr>
            </td>
          </tr> 
          <tr>
            <td>Este e-mail foi enviado às <b>$data_envio</b> </td>
          </tr>
        </table>
    </html>
    ";

// emails para quem serÃ¡ enviado o formulario
    $emailenviar = "danielacfp.web@gmail.com";
    $destino = $emailenviar;
    $assunto = $subject;
 
    // Ã© necessÃ¡rio indicar que o formato do e-mail em html
    $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$nome.'<$email>';
    //$headers .= "Bcc: $EmailPadrao\r\n";
     
    $enviaremail = mail($destino, $assunto, $arquivo, $headers);
    if($enviaremail){
    // $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link serÃ¡ enviado para o e-mail fornecido no formulÃ¡rio";
    echo "<script>alert('Mensagem Enviada com sucesso!');</script> <meta http-equiv='refresh' content='0.1;URL=index.html'>";
    } else {
    $mgm = "<script>alert('Erro ao enviar o email!');</script><meta http-equiv='refresh' content='0.1;URL=index.html'>";
    echo "";
    }
?>