<div class="formats view large-9 medium-8 columns content">
    <h3><?= h($format->name) ?></h3>
    <p><?= $this->Text->autoParagraph(h($format->description)); ?></p>
    <div class="related">
        <h4><?= __('Related Matches') ?></h4>
        <?php if (!empty($format->matches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('When Played') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Venue') ?></th>
            </tr>
            <?php foreach ($format->matches as $matches): ?>
            <tr>
                <td><?= h($matches->when_played) ?></td>
                <td><?= $this->Html->link(h($matches->name), ['controller' => 'Matches', 'action' => 'view', $matches->get('id')]) ?></td>
                <td><?= $this->Html->link(h($matches->venue->get('name')), ['controller' => 'Venues', 'action' => 'view', $matches->venue->get('id')]) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
