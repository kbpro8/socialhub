public function up()
{
    Schema::table('users', function ($table) {
        if (!Schema::hasColumn('users', 'stripe_id')) {
            $table->string('stripe_id')->nullable();
        }
        if (!Schema::hasColumn('users', 'pm_type')) {
            $table->string('pm_type')->nullable();
        }
        if (!Schema::hasColumn('users', 'pm_last_four')) {
            $table->string('pm_last_four', 4)->nullable();
        }
        if (!Schema::hasColumn('users', 'trial_ends_at')) {
            $table->timestamp('trial_ends_at')->nullable();
        }
    });
}
