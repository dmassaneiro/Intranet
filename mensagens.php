<?php if ($msg == 1) { ?>
    <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display = 'none'"
              class="w3-button w3-green w3-large w3-display-topright">x</span>
        <p>Post Cadastrado com Sucesso :)</p>
    </div>
<?php }if ($msg == 2) { ?>
    <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display = 'none'"
              class="w3-button w3-green w3-large w3-display-topright">x</span>
        <p>Sua Idéia foi Gravada com sucesso, Obrigado em contribuir com o crescimento da empresa :)</p>
    </div>
<?php } if ($msg == 3) { ?>
    <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display = 'none'"
              class="w3-button w3-green w3-large w3-display-topright">x</span>
        <p>Sua Mensagem Gravada com sucesso, ela será apenas lida pelo Gerente de RH e você terá uma resposta o mais rápido possível<br>
        </p>
    </div>
<?php } if ($msg == 4) { ?>
    <div class="alert alert-success">
        <strong>Sucesso!</strong> Meta editado.
        <a class="pull-right" href="gerenciaMetas.php"><span class="glyphicon">&#xe014;</span></a>
    </div>
<?php } ?>

