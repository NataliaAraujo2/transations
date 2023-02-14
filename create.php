<?php
include_once("components/header.php");
?>
<div class="container">
    <h1 class="main-title">CADASTRO DE MOVIMENTAÇÃO ATÍPICA</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="personType">Tipo de Cliente:</label>
            <select class="form-control" id="personType" name="personType">
                <option value="1">1</option>"
                <option value="2">2</option>
            </select>
            <script type="text/javascript">
                let list = document.querySelector("#personType")
                list.addEventListener("change", e => {
                    if ()
                        document.querySelector("#change").innerHTML = e.target.value
                })

            </script>
        </div>
        <div class="form-group">
            <label id="change">CPF:</label>
            <input type="text" class="form-control" id="document" value="1" name="document" placeholder="Não use pontos ou virgulas"
                required>
        </div>
        <div class="form-group">
            <label for="name">Nome do Cliente:</label>
            <input type="text" class="form-control" id="name" name="name" value="2"
                placeholder="Dígite o nome completo." required>
        </div>
        <div class="form-group">
            <label for="transaction">Produto:</label>
            <select class="form-control" id="transaction" name="transation">
                <option>Conta Depósito</option>
                <option>Câmbio</option>
                <option>Habitação</option>
                <option>Penhor</option>
                <option>Ações Online</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Data da Movimentação:</label>
            <input type="text" class="form-control" id="date" name="date" placeholder=####/##/## required>
        </div>
        <div class="form-group">
            <label for="value">Valor Movimentado:</label>
            <input type="text" class="form-control" id="value" name="value"
                placeholder="Utilize ponto para separar as casas decimais." required>
        </div>
        <div class="form-group">
            <label for="detail">Observações</label>
            <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Observações." required
                rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">CADASTRAR</button>
</div>

</form>
</div>
<?php
include_once("components/backbtn.php")
    ?>
<?php
include_once("components/footer.php")
    ?>