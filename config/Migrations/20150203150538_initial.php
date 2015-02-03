<?php
use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('batsmen');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('player_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('innings_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('runs', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('balls', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('strike_rate', 'float', [
                'limit' => '10',
                'unsigned' => '',
                'null' => '',
                'default' => '0.00'
            ])
            ->addColumn('fours', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('sixes', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('batting_styles');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('bowlers');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('player_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('innings_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('overs', 'float', [
                'limit' => '10',
                'unsigned' => '',
                'null' => '',
                'default' => '0.0'
            ])
            ->addColumn('runs', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('economy', 'float', [
                'limit' => '10',
                'unsigned' => '',
                'null' => '',
                'default' => '0.00'
            ])
            ->addColumn('maidens', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('bowling_styles');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('shorthand', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('clubs');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('alt_name', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('image', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('image_dir', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('league_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('dismissals');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('formats');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('description', 'text', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('innings');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('innings_type_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('match_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('team_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('wides', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => '0'
            ])
            ->addColumn('byes', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => '0'
            ])
            ->addColumn('leg_byes', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => '0'
            ])
            ->addColumn('no_balls', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => '0'
            ])
            ->addColumn('penalty_runs', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => '0'
            ])
            ->addColumn('declared', 'boolean', [
                'limit' => '',
                'null' => '1',
                'default' => '0'
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('innings_types');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('leagues');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('description', 'text', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('image', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('image_dir', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('matches');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('when_played', 'datetime', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('venue_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('format_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('player_specialisations');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('description', 'text', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('players');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('first_name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('initials', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('last_name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('slug', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('photo', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('photo_dir', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('number', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('nationality', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('batting_style_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('bowling_style_id', 'uuid', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('player_specialisation_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('club_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('squads');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('player_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('team_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('captain', 'boolean', [
                'limit' => '',
                'null' => '',
                'default' => '0'
            ])
            ->addColumn('position', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '',
                'default' => ''
            ])
            ->save();
        $table = $this->table('teams');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('club_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('match_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('users');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('username', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('email', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('password', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('role', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => 'user'
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('venues');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('name', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('location', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('capacity', 'integer', [
                'limit' => '11',
                'unsigned' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('image', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('image_dir', 'string', [
                'limit' => '255',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
        $table = $this->table('wickets');
        $table
            ->addColumn('id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('lost_wicket_player_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('took_wicket_player_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('bowler_player_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('dismissal_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('fall_of_wicket', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('innings_id', 'uuid', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '1',
                'default' => ''
            ])
            ->save();
    }

    /**
     * Migrate Up.
     *
     * @return void
     */
    public function up()
    {
    }

    /**
     * Migrate Down.
     *
     * @return void
     */
    public function down()
    {
    }

}
