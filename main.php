<?php

function downloadYoutubeVideo($youtubeLink, $format = 'mp4')
{
    // Escape the YouTube link for safety
    $escapedYoutubeLink = escapeshellarg($youtubeLink);

    // Define the output format (mp4 or mp3)
    $outputFormat = ($format === 'mp3') ? 'mp3' : 'mp4';

    // Command to download video using youtube-dl
    $command = "youtube-dl -f best -o 'downloads/%(title)s.%(ext)s' -- $escapedYoutubeLink";

    // Execute the command
    exec($command, $output, $returnCode);

    if ($returnCode === 0) {
        echo "Video downloaded as $outputFormat successfully!\n";
    } else {
        echo "Error downloading video: " . implode("\n", $output) . "\n";
    }
}

// Example usage
$youtubeLink = 'https://www.youtube.com/watch?v=VIDEO_ID';
// To download as MP4:
downloadYoutubeVideo($youtubeLink, 'mp4');

// To download as MP3:
// downloadYoutubeVideo($youtubeLink, 'mp3');
