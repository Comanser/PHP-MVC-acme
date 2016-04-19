<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
  public function up()
  {
      $password_hash1 = password_hash('verysecret', PASSWORD_DEFAULT);
      $password_hash2 = password_hash('misio01', PASSWORD_DEFAULT);

      $this->execute("
          insert into users (first_name, last_name, email, password)
          values
          ('Trevor', 'Sawler', 'me@here.ca', '$password_hash1'),
          ('Misio', 'Puszysty', 'misio@wp.pl', '$password_hash2')
      ");
  }

  public function down()
  {

  }
}
