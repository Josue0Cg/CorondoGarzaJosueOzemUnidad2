<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<style>
    .stock-bar-container {
        width: 100%;
        max-width: 150px; /* Ancho máximo de la barra */
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-radius: 4px;
        overflow: hidden; /* Asegura que la barra interior no se salga */
    }

    .stock-bar-level {
        height: 20px;
        line-height: 20px; /* Centra el texto verticalmente */
        color: white;
        font-weight: bold;
        font-size: 12px;
        text-align: center;
        width: 0%; /* El ancho se definirá con PHP */
        transition: width 0.3s ease; /* Pequeña animación */
    }
</style>
<div class="products index content">
    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= __('Nivel de Stock') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= $this->Number->format($product->price) ?></td>
                    <td><?= $this->Number->format($product->quantity) ?></td>
                    <td>
                        <div class="stock-bar-container">
                            <?php
                            // Definir el nivel de stock y el color basado en la cantidad
                            $quantity = $product->quantity;
                            if ($quantity > 50) {
                                $color = 'green';
                                $level = 100; // Nivel alto
                            } elseif ($quantity > 20) {
                                $color = 'orange';
                                $level = 60; // Nivel medio
                            } else {
                                $color = 'red';
                                $level = 30; // Nivel bajo
                            }
                            ?>
                            <div class="stock-bar-level" style="width: <?= $level ?>%; background-color: <?= $color ?>;">
                                <?= $quantity ?>
                            </div>
                        </div>
                    </td>
                    <td><?= h($product->created) ?></td>
                    <td><?= h($product->modified) ?></td> 
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $product->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $product->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>