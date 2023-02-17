<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE VIEW v_visitors_logs AS
        select visitors_logs.created_at, visitors.name, visitors.contact, visitors.address, purposes.department, purposes.staff, purposes.purpose, visitors_logs.log_type from visitors inner join visitors_logs on visitors.id = visitors_logs.visitors_id inner join purposes on visitors.id = purposes.visitors_id
        ");





            // TRIGGER TO INSERT INTO VISITORS LOG TABLE


            DB::unprepared("CREATE TRIGGER `after_insert_into_visitors_insert_visitors_log` AFTER INSERT ON `visitors` FOR EACH ROW BEGIN
            IF (NEW.status = 'Active')
            THEN

            INSERT into visitors_logs(visitors_logs.visitors_id, visitors_logs.log_type) VALUES(NEW.id, 'IN');
            END IF;
            END
        ");




            // TRIGGER TO INSERT INTO VISITORS LOG TABLE AFTER VISITOR LOG TYPE IS UPDATED

        DB::unprepared("CREATE TRIGGER `after_update_on_visitors_insert_visitors_log` AFTER UPDATE ON `visitors` FOR EACH ROW BEGIN

        IF (OLD.log_type != NEW.log_type)
            THEN

        INSERT into visitors_logs(visitors_logs.visitors_id, visitors_logs.log_type) VALUES(NEW.id, OLD.log_type);
        END IF;
        END
        ");




        // TRIGGER TO UPDATE INTO VISITORS TABLE AFTER INTO PURPOSE TBALE


        DB::unprepared("CREATE TRIGGER `after_insert_into_purposes_update_log_type_on_visitors` AFTER INSERT ON `purposes` FOR EACH ROW BEGIN

            IF(NEW.status = 'Active')
            THEN
            UPDATE visitors SET visitors.log_type = 'OUT' WHERE visitors.id = NEW.visitors_id;
            END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
