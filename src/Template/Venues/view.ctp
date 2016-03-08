<div class="venues view large-9 medium-8 columns content">
    <h3><?= h($venue->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($venue->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($venue->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($venue->capacity) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Matches') ?></h4>
        <?php if (!empty($venue->matches)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('When Played') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Format') ?></th>
                </tr>
                <?php foreach ($venue->matches as $matches): ?>
                    <tr>
                        <td><?= h($matches->when_played) ?></td>
                        <td><?= $this->Html->link(h($matches->name), ['controller' => 'Matches', 'action' => 'view', $matches->get('id')]) ?></td>
                        <td><?= $this->Html->link(h($matches->format->get('name')), ['controller' => 'Formats', 'action' => 'view', $matches->format->get('id')]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
