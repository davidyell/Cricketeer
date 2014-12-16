<div class="clubs index">
    <h2>Clubs</h2>

    <table summary="clubs">
        <thead>
            <tr>
                <th colspan="2">Name</th>
                <th>Players</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clubs as $club):?>
                <tr>
                    <td class="logo"><?php echo $this->Html->image('../files/clubs/image/' . $club->image_dir . '/squareSmall_' . $club->image);?></td>
                    <td><?php echo $this->Html->link($club->name, ['controller' => 'clubs', 'action' => 'view', $club->id]);?></td>
                    <td><?php echo count($club->players);?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>