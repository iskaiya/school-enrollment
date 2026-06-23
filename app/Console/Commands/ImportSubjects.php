<?php

namespace App\Console\Commands;

use App\Models\Subject;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:import-subjects {path}')]
#[Description('Import offered subjects from a CSV file')]
class ImportSubjects extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('path');

        if (!file_exists($filePath)) {
            $this->error("File not found at: {$filePath}");
            return Command::FAILURE;
        }

        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row (code,title,department,units)
            fgetcsv($handle, 1000, ',');

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                Subject::updateOrCreate(
                    ['code' => $data[0]], // Prevents duplicate entries
                    [
                        'title' => $data[1],
                        'department' => $data[2],
                        'units' => (int) $data[3],
                    ]
                );
            }

            fclose($handle);
            $this->info('Subjects imported successfully!');
            return Command::SUCCESS;
        }

        $this->error('Could not open the file.');
        return Command::FAILURE;
    }
}
