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


        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('visitors_id');
            $table->string('log_type')->nullable(true);
            $table->string('status')->default('Active');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('visitors_id')->references('id')->on('visitors')->onDelete('restrict')->onUpdate('cascade');
        });



//             // TRIGGER TO INSERT INTO VISITORS LOG TABLE AFTER VISITOR LOG TYPE IS UPDATED

        DB::unprepared("CREATE TRIGGER `update_visitors_logtype_update_visitorslog_timeout` AFTER UPDATE ON `visitors`
        FOR EACH ROW BEGIN
       
           IF (NEW.log_type = 'IN')
           THEN
           
       UPDATE v_visitors_logs SET v_visitors_logs.timeout = NEW.updated_at
       WHERE v_visitors_logs.visitors_id = NEW.id order by v_visitors_logs.id desc LIMIT 1;
       
       END IF;
       END
        ");




        // TRIGGER TO UPDATE INTO VISITORS TABLE AFTER INTO PURPOSE TBALE


        DB::unprepared("CREATE TRIGGER `after_insert_int_visitors_insert_logs` AFTER INSERT ON `visitors` FOR EACH ROW BEGIN

        IF (NEW.status = 'Active')
        THEN
    
    INSERT into logs(logs.visitors_id, logs.log_type) VALUES(NEW.id, 'IN');
        END IF;
    
    END
        ");






            DB::unprepared("CREATE TRIGGER `after_update_on_visitors_insert_logs` AFTER UPDATE ON `visitors` FOR EACH ROW BEGIN

            IF (OLD.log_type != NEW.log_type)
            THEN

            INSERT into logs(logs.visitors_id, logs.log_type) VALUES(NEW.id, OLD.log_type);
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
        Schema::dropIfExists('logs');
    }
};
