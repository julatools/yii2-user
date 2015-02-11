<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\db\Schema;
use chdchd7well\user\migrations\Migration;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class m140403_174025_create_account_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%sys_account}}', [
            'id'         => Schema::TYPE_PK,
            'user_id'    => Schema::TYPE_INTEGER,
            'provider'   => Schema::TYPE_STRING . ' NOT NULL',
            'client_id'  => Schema::TYPE_STRING . ' NOT NULL',
            'properties' => Schema::TYPE_TEXT
        ], $this->tableOptions);

        $this->createIndex('sys_account_unique', '{{%sys_account}}', ['provider', 'client_id'], true);
        $this->addForeignKey('fk_sys_user_sys_account', '{{%sys_account}}', 'user_id', '{{%sys_user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%account}}');
    }
}