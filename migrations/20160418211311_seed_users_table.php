<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
  public function up()
  {
      $password_hash1 = password_hash('verysecret', PASSWORD_DEFAULT);
      $password_hash2 = password_hash('misio01', PASSWORD_DEFAULT);

      $this->execute("
          insert into users (first_name, last_name, email, password, active)
          values
          ('Trevor', 'Sawler', 'me@here.ca', '$password_hash1', 1),
          ('Misio', 'Puszysty', 'webmaster@dobrypasterz.org.pl', '$password_hash2', 1)
      ");
  }

  public function down()
  {

  }
}
