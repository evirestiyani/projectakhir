    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('murid', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('nis')->unique();
                $table->string('kelas');
                $table->string('no_telp');
                $table->enum('jenis_kelamin', ['L', 'P']);
                $table->date('tgl_lahir');
                $table->foreignId('id_user');
                $table->timestamps();

                // Foreign key ke tabel users
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */     
        public function down(): void
        {
            Schema::dropIfExists('murid');
        }
    };
