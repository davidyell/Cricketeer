<div class="leagues index">
    <?php foreach ($leagues as $league):?>
        <div class="league">
            <?php echo $this->Html->image('../files/leagues/image/' . $league->image_dir . '/square_' . $league->image, ['class' => 'div-logo']);?>
            <h2><?php echo $this->Html->link($league->name, ['controller' => 'leagues', 'action' => 'view', $league->id]);?></h2>
            <?php if (!empty($league->description)) {
                echo "<p>{$league->description}</p>";
            }?>
        </div>
        <div class="clearfix"><!-- blank --></div>
    <?php endforeach;?>

    <ul class="pagination">
        <?php
        echo $this->Paginator->prev('&laquo;', ['escape' => false]);
        echo $this->Paginator->numbers();
        echo $this->Paginator->next('&raquo;', ['escape' => false]);
        ?>
    </ul>
</div>