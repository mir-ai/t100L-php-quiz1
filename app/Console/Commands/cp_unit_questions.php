<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class cp_unit_questions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cp_unit_questions {src_dir?} {dst_dir?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy test questions in unit test directory.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $src_rel_dir = $this->argument('src_dir');
        $dst_rel_dir = $this->argument('dst_dir');

        if (! $src_rel_dir) {
            $this->output->error('src_dir not defined. ex) tests/Unit/U01_Answer');
            exit(1);
        }

        if (! $dst_rel_dir) {
            $this->output->error('dst_dir not defined. ex) tests/Unit/U10_Obata');
            exit(1);
        }

        $src_abs_dir = base_path($src_rel_dir);
        $dst_abs_dir = base_path($dst_rel_dir);

        $src_base_name = basename($src_rel_dir);
        $dst_base_name = basename($dst_rel_dir);
        
        if (! is_dir($src_abs_dir)) {
            $this->output->error("src_dir not exit: {$src_abs_dir}");
            exit(1);
        }

        if (! is_dir($dst_abs_dir)) {
            $this->output->error("dst_dir not exit: {$dst_abs_dir}");
            exit(1);
        }

        $files = scandir($src_abs_dir);
        $files = array_diff($files, ['.', '..']);

        $copied = 0;
        foreach ($files as $file) {
            if (! str_contains($file, 'Test.php')) {
                continue;
            }
            $src_file_path = "{$src_abs_dir}/$file";
            $dst_file_path = "{$dst_abs_dir}/$file";

            $content = file_get_contents($src_file_path);

            // QUIZ - /QUIZ 間を $a = null; に置き換える
            $content = $this->eraseAnswer($content);

            // namespaceを置き換える
            $content = str_replace($src_base_name, $dst_base_name, $content);

            // ファイルを書き込む
            file_put_contents($dst_file_path, $content);

            $this->output->writeln("> {$file}");
            $copied++;
        }

        $this->output->success('Questions Copied.');
    }

    // QUIZ - /QUIZ 間を $a = null; に置き換える
    private function eraseAnswer(string $content): string
    {
        $lines = explode("\n", $content);

        $outs = [];
        $in_question = false;
        foreach ($lines as $line) {
            $line = rtrim($line);

            // if (str_starts_with($line, 'namespace Tests')) {
            //     // Namespaceを置き換える
            //     $line = str_replace('', '', $line);
            //     $outs[] = $line;
            //     continue;
            // }

            if (! $in_question) {
                // QUIZの外
                $outs[] = $line;

                if (str_contains($line, ' QUIZ')) {
                    // QUIZを見つけた
                    $in_question = true;
                    $outs[] = "\t\t\$a = null;";
                }

            } else {
                // QUIZの中

                if (str_contains($line, ' /QUIZ')) {
                    $in_question = false;
                    $outs[] = $line;
                }

            }
        }

        return implode("\n", $outs);
    }
}
