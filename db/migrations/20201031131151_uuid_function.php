<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UuidFunction extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        /**
         * https://mariadb.com/kb/en/guiduuid-performance/
            -- Letting MySQL create the UUID:
                INSERT INTO t (uuid, ...) VALUES (UuidToBin(UUID()), ...);

            -- Creating the UUID elsewhere:
                INSERT INTO t (uuid, ...) VALUES (UuidToBin(?), ...);

            -- Retrieving (point query using uuid):
                SELECT ... FROM t WHERE uuid = UuidToBin(?);

            -- Retrieving (other):
                SELECT UuidFromBin(uuid), ... FROM t ...;
         */
        $sql = "
            CREATE FUNCTION UuidToBin(_uuid BINARY(36))
                RETURNS BINARY(16)
                LANGUAGE SQL  DETERMINISTIC  CONTAINS SQL  SQL SECURITY INVOKER
            RETURN
                UNHEX(CONCAT(
                    SUBSTR(_uuid, 15, 4),
                    SUBSTR(_uuid, 10, 4),
                    SUBSTR(_uuid,  1, 8),
                    SUBSTR(_uuid, 20, 4),
                    SUBSTR(_uuid, 25) ));
            CREATE FUNCTION UuidFromBin(_bin BINARY(16))
                RETURNS BINARY(36)
                LANGUAGE SQL  DETERMINISTIC  CONTAINS SQL  SQL SECURITY INVOKER
            RETURN
                LCASE(CONCAT_WS('-',
                    HEX(SUBSTR(_bin,  5, 4)),
                    HEX(SUBSTR(_bin,  3, 2)),
                    HEX(SUBSTR(_bin,  1, 2)),
                    HEX(SUBSTR(_bin,  9, 2)),
                    HEX(SUBSTR(_bin, 11))
                         ));";

        $this->execute($sql);
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $sql = 'DROP FUNCTION UuidFromBin;DROP FUNCTION UuidToBin;';
        $this->execute($sql);
    }
}
