<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-sm-6">
                    <h6 class="m-0 text-dark"><i class="<?= $titulo['icone'] ?>"></i> <?= $titulo['modulo'] ?></h6>
                </div><!-- /.col -->
                <div class="col-sm-6 no-print">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($caminhos as $caminho) : ?>
                            <?php if (!$caminho['active']) : ?>
                                <li class="breadcrumb-item"><a href="<?= $caminho['rota'] ?>"><?= $caminho['titulo'] ?></a></li>
                            <?php else : ?>
                                <li class="breadcrumb-item active"><?= $caminho['titulo'] ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </div><!-- /.col -->
            </div>
            <div class="card">
                <div class="card-body no-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="/inventarioDoEstoque/create_1" class="btn btn-info"><i class="fas fa-plus-circle"></i> Gerar Inventário Do Estoque Atual</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 35px">Cód.</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Observações</th>
                                <th class="no-print" style="width: 125px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($inventarios)) : ?>
                                <?php foreach ($inventarios as $inventario) : ?>
                                    <tr>
                                        <td><?= $inventario['id_inventario'] ?></td>
                                        <td><?= $inventario['descricao'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($inventario['data'])) ?></td>
                                        <td><?= $inventario['observacoes'] ?></td>
                                        <td class="no-print">
                                            <a href="/inventarioDoEstoque/show/<?= $inventario['id_inventario'] ?>" class="btn btn-info style-action"><i class="fas fa-folder-open"></i></a>
                                            <a href="/inventarioDoEstoque/edit/<?= $inventario['id_inventario'] ?>" class="btn btn-warning style-action"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger style-action" onclick="confirmaAcaoExcluir('Deseja realmente excluir esse Inventário?', '/inventarioDoEstoque/delete/<?= $inventario['id_inventario'] ?>')"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">Nenhum registro!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->