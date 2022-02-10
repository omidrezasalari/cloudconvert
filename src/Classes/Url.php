<?php

namespace Omidrezasalari\Cloudconvert\Classes;

use \CloudConvert\CloudConvert;
use \CloudConvert\Models\Job;
use \CloudConvert\Models\Task;

class Url extends Convert
{
    public const URL = "Your video path";

    public function convert(string $fileName)
    {
        $cloudconvert = new CloudConvert(['api_key' => self::API_KEY]);

        $importTaskName = uniqid();
        $convertTaskName = uniqid();
        $exportaskName = uniqid();

        $job = (new Job())
            ->addTask(
                (new Task('import/url', $importTaskName))
                    ->set('url', self::URL)
                    ->set('filename', $fileName)
            )->addTask(
                (new Task('convert', $convertTaskName))
                    ->set('input_format', 'webm')
                    ->set('output_format', 'mp4')
                    ->set('engine', 'ffmpeg')
                    ->set('input', [$importTaskName])
                    ->set('video_codec', 'x264')
                    ->set('crf', 23)
                    ->set('preset', 'medium')
                    ->set('subtitles_mode', 'none')
                    ->set('audio_codec', 'aac')
                    ->set('audio_bitrate', 128)
                    ->set('engine_version', '4.4.1')
                    ->set('filename', strtotime("now") . '.mp4')
            )->addTask(
                (new Task('export/url', $exportaskName))
                    ->set('input', [$convertTaskName])
                    ->set('inline', false)
                    ->set('archive_multiple_files', false)
            );

        $cloudconvert->jobs()->create($job);
        $wait = $cloudconvert->jobs()->wait($job);

        $export_urls = $job->getExportUrls();

        return $export_urls[0]->url;
    }
}
