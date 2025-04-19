<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TranscribeCommand extends Command
{
    protected static $defaultName = 'youtube-transcribe';

    protected function configure(): void
    {
        $this
            ->setDescription('Download audio from a YouTube video and transcribe it.')
            ->addArgument('url', InputArgument::REQUIRED, 'The YouTube video URL')
            ->addArgument('language', InputArgument::REQUIRED, 'The language for transcription')
            ->addArgument('filename', InputArgument::REQUIRED, 'The output filename');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = $input->getArgument('url');
        $language = $input->getArgument('language');
        $filename = $input->getArgument('filename');
        
        $output->writeln("🔗 YouTube URL: {$url}");
        $output->writeln("🌍 Language: {$language}");
        $output->writeln("💾 Output Filename: {$filename}");

        $output->writeln("🔻 Downloading audio...");
        $audioFile = sys_get_temp_dir() . '/' . uniqid('audio_', true) . '.mp3';
        $downloadCommand = escapeshellcmd("yt-dlp -f bestaudio --extract-audio --audio-format mp3 -o {$audioFile} {$url}");
        exec($downloadCommand, $out, $result);

        if ($result !== 0) {
            $output->writeln("<error>❌ Error downloading audio</error>");
            return Command::FAILURE;
        }

        $output->writeln("✅ Audio downloaded: {$audioFile}");
        $output->writeln("📝 Starting transcription...");

        $whisperCommand = escapeshellcmd("whisper {$audioFile} --language {$language} --output_file {$filename}");
        exec($whisperCommand, $out, $result);

        if ($result !== 0) {
            $output->writeln("<error>❌ Error during transcription</error>");
            return Command::FAILURE;
        }

        $output->writeln("✅ Transcription completed: {$filename}");
        return Command::SUCCESS;
    }
}