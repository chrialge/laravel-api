<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $note_default = new Note();
        $note_default->name = 'default';
        $note_default->slug = Str::slug($note_default->name, '-');
        $note_default->content = 'default content';
        $note_default->save();
    }
}
