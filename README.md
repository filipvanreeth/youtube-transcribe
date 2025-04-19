# YouTube Transcribe

## Overview
YouTube Transcribe is a command-line tool that allows users to transcribe YouTube videos into text files. It uses Whisper OpenAI for transcription and YouTube Downloader CLI (yt-dlp) to download video content.

## Features
- Transcribe YouTube videos into text files.
- Specify the language for transcription.
- Save the transcription with a custom filename.

## Requirements
- PHP
- Symfony Console
- Whisper OpenAI CLI
- yt-dlp CLI

## Installation
1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd youtube-transcribe
   ```
3. Install dependencies using Composer:
   ```bash
   composer install
   ```

## Usage
Run the `youtube-transcribe` command with the required arguments:
```bash
php bin/console youtube-transcribe <url> <language> <filename>
```
- `<url>`: The URL of the YouTube video.
- `<language>`: The language code for transcription (e.g., `en` for English).
- `<filename>`: The name of the output text file.

### Example
```bash
php bin/console youtube-transcribe https://www.youtube.com/watch?v=example en transcript.txt
```

## Development
- Ensure you have the required CLI tools (`whisper` and `yt-dlp`) installed and accessible in your system's PATH.
- Follow the coding guidelines outlined in the project documentation.

## Contributing
Contributions are welcome! Please follow the standard Git workflow:
1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Commit your changes and push the branch.
4. Submit a pull request.

## License
This project is licensed under the MIT License. See the LICENSE file for details.