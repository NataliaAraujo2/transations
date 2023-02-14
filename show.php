<?php
include_once("components/header.php");
include_once("config/process.php");
include_once("components/functions/functions.php")
    ?>
<div class="container">
    <?php
    if (isset($printMsg) && $printMsg != ''):
        ?>
        <p id="msg">
            <?= $printMsg ?>
        </p>
        <?php
    endif;
    ?>
</div>
<div class="transation">
    <h1 class="show-main-title">ID:
        <?= $movements["id"] ?>
        <?php
        if ($movements["person_type"] == "1"):
            ?>
            PESSOA FÍSICA
        <?php else: ?>
            PESSOA JURÍDICA
            <?php
        endif;
        ?>
</div>
<h1 class="main-title">DADOS DO CLIENTE</h1>
<div class="show-container">

    <div class="show-document">
        <label>CPF:
            <?php
            if ($movements["person_type"] == "1"):
                ?>
                <?php
                $cpf = $movements["cpf_cnpj"];
                echo mask($cpf, "###.###.###-##");
                ?>
            <?php else: ?>
                <?php
                $cnpj = $movements["cpf_cnpj"];
                echo mask($cnpj, "##.###.###/####-##");
                ?>
                <?php
            endif;
            ?>
        </label>
    </div>
    <div class="show-name">
        <label>Nome:
            <?= $movements["name"] ?>
        </label>
    </div>
    <div class="show-agência">
        <label>Agência:
            XXXX
        </label>
    </div>
    <div class="show-conta">
        <label>Nº da Conta:
            XXXXXXXXXXXXXX
        </label>
    </div>
    <div class="show-op">
        <label>Operação:
            XX
        </label>
    </div>
</div>
<div class="show-container trasation-data">
    <div class="show-transation-type">
        <label>Tipo da Movimentação:
            <?= $movements["transation"] ?>
        </label>
    </div>
    <div class="show-transation-date">
        <label>Data:
        </label>
    </div>
    <div class="show-transation-value">
        <label>Valor Movimentado:
            <?php
            $moneyValue = $movements["transation_value"];
            echo "R$" . " " . number_format($moneyValue, 2, ",", ".");
            ?>
        </label>
    </div>
</div>
<div class="transation-details ">
    <div class="show-transation-detail">
        <label>DETALHES DA TRANSAÇÃO</label>
    </div>
    <div class="transaction-description">
        <?= $movements["transation_detail"] ?>
    </div>

</div>

<?php
include_once("components/backbtn.php")
    ?>
<?php
include_once("components/footer.php")
    ?>