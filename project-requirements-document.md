# Project Requirements Document

This document outlines the requirements and specifications for the project. It serves as a reference for developers to understand the goals, features, and constraints of the project.

## Project Overview
YouTube Transcribe will provide the user to use a CLI command called `youtube-transcribe` with a required `url` and `language` and `filename` argument. The YouTube video will then be transcribed into a TXT file. The project will use Whisper OpenAI and YouTube Downloader CLI commands to process the job and will export a TXT file with the provided `filename` argument. 

## Technical Requirements
Specify the technical requirements for the project:
- Programming language(s): PHP, Symfony Console with the command 'youtube-transcribe'
- CLI commands: whisper, yt-dlp
