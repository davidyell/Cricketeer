<div class="leagues view">
    <?php echo $this->Html->image('../files/leagues/image/' . $league->image_dir . '/square_' . $league->image, ['class' => 'div-logo']);?>
    <h2><?php echo $this->Html->link($league->name, ['controller' => 'Leagues', 'action' => 'view', $league->id]);?></h2>
    <?php if (!empty($league->description)) {
        echo "<p>{$league->description}</p>";
    }?>

    <table summary="league-teams">
        <thead>
            <tr>
                <th colspan="2">Team</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($league->clubs as $club): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->image('../files/clubs/image/' . $club->image_dir . '/squareSmall_' . $club->image);?>
                        <?php echo $this->Html->link($club->name, ['controller' => 'Clubs', 'action' => 'view', $club->id]);?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>