<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="bg bg-dark text-white">ID</th>
                    <th scope="col" class="bg bg-dark text-white">Categoria</th>
                    <th scope="col" class="bg bg-dark text-white">Opções</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categoria";
                $consulta = $pdo->prepare($sql);
                $consulta = $pdo->query($sql);
                $dados = $consulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($dados as $dado) {
                ?>
                    <tr class="text-center">
                        <td><?= $dado->id ?></td>
                        <td><?= $dado->nome ?></td>
                        <td>
                            <a href="cadastros/categorias/<?=$dado->id?>" class="btn btn-success"><i class="fas fa-edit"></i></a> 
                            <a href="#" class="btn btn-danger">Excluir</a> 
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>