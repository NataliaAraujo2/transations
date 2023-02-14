<?php
include_once("components/header.php");
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
    <h1 id="main-title">TRANSAÇÕES</h1>
    <?php
    if (count($movements) > 0):
        ?>
        <table class="table" id="movements-table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">PF/PJ</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($movements as $movements):
                    ?>
                    <tr>
                        <td scope="row" class="col-id">
                            <?= $movements["id"] ?>
                        </td>
                        <td scope="row">
                            <?php
                            if ($movements["person_type"] == "1"):
                                ?>
                                PF
                            <?php else: ?>
                                PJ
                                <?php
                            endif;
                            ?>
                        </td>
                        <td scope="row">
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

                        </td>
                        <td scope="row">
                            <?= $movements["name"] ?>
                        </td>
                        <td scope="row">
                            <?= $movements["transation"] ?>
                        </td>
                        <td scope="row">
                            <?= $movements["transation_date"] ?>
                        </td>
                        <td scope="row">
                            <?php
                            $moneyValue = $movements["transation_value"];
                            echo "R$" . " " . number_format($moneyValue, 2, ",", ".");
                            ?>
                        </td>

                        <td class="actions">
                            <a href="<?= $BASE_URL ?>show.php?id=<?= $movements["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="#"><i class="far fa-edit edit-icon"></i></a>
                            <button type="submit" class="delete-btn"> <i class="fas fa-times delete-icon"></i> </button>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>

        </table>
    <?php else: ?>
        <p id="empty-list-text">
            Ainda não há transações.
            <a href="<?= $BASE_URL ?>create.php">
                Clique aqui para adicionar
            </a>
        </p>
    <?php endif; ?>
</div>
<?php
include_once("components/footer.php")
    ?>