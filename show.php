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
    <div class="container" id="view-movements-container">
        <div class="container-items">
            <div class="view-person">
                <div class="person-type">
                    <label>
                        <?php
                        if ($movements["person_type"] == "1"):
                            ?>
                            Pessoa Física
                        <?php else: ?>
                            Pessoa Jurídica
                            <?php
                        endif;
                        ?>
                    </label>
                </div>
                <div class="person-document">
                    <label>
                        <?php
                        if ($movements["person_type"] == "1"):
                            ?>
                            CPF:
                        <?php else: ?>
                            CNPJ:
                            <?php
                        endif;
                        ?>
                    </label>
                    <label>
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
                <div class="person-name">
                    <label>Nome:</label>
                    <label class="person-name">
                        <?= $movements["name"] ?>
                    </label>
                </div>
            </div>
            <div class="view-transation">
                <div class="transation-type">
                <label>Tipo de Transação:</label>
                <label>
                    <?= $movements["transation"] ?>
                </label>
                </div>
                <div class="transation-date">
                    <label>Data:</label>
                    <label><?= $movements["transation_date"] ?></label>
                </div>
                <div class="transation-value">
                    <label>
                    <?php
                            $moneyValue = $movements["transation_value"];
                            echo "R$" . " " . number_format($moneyValue, 2, ",", ".");
                            ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include_once("components/footer.php")
    ?>