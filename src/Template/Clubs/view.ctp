<div class="clubs view">
    <h2><?php echo $club->name;?></h2>
    <h3><?php echo $club->alt_name;?></h3>
    <?php echo $this->Html->image('../files/clubs/image/' . $club->image_dir . '/squareSmall_' . $club->image);?>

    <table summary="club-roster">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bats</th>
                <th>Bowls</th>
                <th>Number</th>
                <th>Specialisation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($club->players as $player): ?>
                <tr>
                    <td><?php echo $player->get('FullName');?></td>
                    <td><?php echo $player->bats;?></td>
                    <td><?php echo $player->bowls;?></td>
                    <td><?php echo $player->number;?></td>
                    <td><?php echo $player->player_specialisation->name;?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>