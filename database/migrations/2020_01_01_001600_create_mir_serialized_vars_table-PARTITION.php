<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMirSerializedVarsTablePARTITION extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mir_serialized_vars', function (Blueprint $table) {

            $ddl = "
create table `mir_serialized_vars` (
`id` int unsigned not null auto_increment,
`var_yymm` int not null,
`var_name` varchar(255) not null,
`serialized_var` mediumblob not null,
`user_id` int not null,
`original_file_name` varchar(255) null,
`file_size` int null,
`expired_at` datetime not null,
`deleted_at` datetime null,
`created_at` datetime not null default CURRENT_TIMESTAMP,
`updated_at` datetime not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,

 primary key(`id`, `var_yymm`),
 index idx_var_name(`var_name`)

) engine=InnoDB default character set utf8mb4 collate 'utf8mb4_unicode_ci'
partition by range( var_yymm ) (

    PARTITION part_2024 VALUES LESS THAN (2501),
    PARTITION part_2025 VALUES LESS THAN (2601),
    PARTITION part_2026 VALUES LESS THAN (2701),
    PARTITION part_2027 VALUES LESS THAN (2801),
    PARTITION part_2028 VALUES LESS THAN (2901),
    PARTITION part_2029 VALUES LESS THAN (3001),
    PARTITION part_2030 VALUES LESS THAN (3101),
    PARTITION part_2031 VALUES LESS THAN (3201),
    PARTITION part_2032 VALUES LESS THAN (3301),
    PARTITION part_2033 VALUES LESS THAN (3401),
    PARTITION part_2034 VALUES LESS THAN (3501),
    PARTITION part_2035 VALUES LESS THAN (3601),
    PARTITION part_2036 VALUES LESS THAN (3701),
    PARTITION part_2037 VALUES LESS THAN (3801),
    PARTITION part_2038 VALUES LESS THAN (3901),
    PARTITION part_2039 VALUES LESS THAN (4001),
    PARTITION part_2040 VALUES LESS THAN (4101),
    PARTITION part_2041 VALUES LESS THAN (4201),
    PARTITION part_2042 VALUES LESS THAN (4301),
    PARTITION part_2043 VALUES LESS THAN (4401),
    PARTITION part_2044 VALUES LESS THAN (4501),
    PARTITION part_2045 VALUES LESS THAN (4601),
    PARTITION part_2046 VALUES LESS THAN (4701),
    PARTITION part_2047 VALUES LESS THAN (4801),
    PARTITION part_2048 VALUES LESS THAN (4901)


    
)";
            DB::statement($ddl);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mir_serialized_vars');
    }
}
